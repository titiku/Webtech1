<?php
namespace Oop;
use PDO;
use Oop\Account;
use Oop\Event;
use Oop\Log;
use Oop\Comment;
use Oop\Attendant;

class Database {
  function checkUsernameAndPassword($username, $password){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');

    $statement = $connection->query('SELECT * FROM accounts ');
    $user="wrong";
        while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
          if($row['username']==$username && password_verify($password, $row['password'])){
            $user=new Account($row['id_ac'],$row['username'],$row['password'],$row['first_name'],$row['last_name'],$row['age']
            ,$row['gender'],$row['email'],$row['phone'],$row['address'],$row['ID'],$row['type'],$row['image'],$row['status']);
            return $user;
          }
        }
    return $user;
  }

  function changePassword($username, $password){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
    $qurry = 'UPDATE accounts SET password="'.$password.'" WHERE username="'.$username.'"';
    $connection->exec($qurry);
  }

  function loadAccount($id_ac){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
    $statement = $connection->query('SELECT * FROM accounts WHERE id_ac="'.$id_ac.'"');
    while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $user = new Account($row['id_ac'],$row['username'],$row['password'],$row['first_name'],$row['last_name'],$row['age']
      ,$row['gender'],$row['email'],$row['phone'],$row['address'],$row['ID'],$row['type'],$row['image'],$row['status']);
      return $user;
    }
  }

  function loadAccounts(){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
    $statement = $connection->query('SELECT * FROM accounts');
    $users = array();
    $count = 0;
    while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $user = new Account($row['id_ac'],$row['username'],$row['password'],$row['first_name'],$row['last_name'],$row['age']
      ,$row['gender'],$row['email'],$row['phone'],$row['address'],$row['ID'],$row['type'],$row['image'],$row['status']);
      $users[$count] = $user;
      $count = $count + 1;
    }
    return $users;
  }

  function loadAllaccounts(){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
    $statement = $connection->query('SELECT * FROM accounts');
    $statement->execute();
    $people = $statement->fetchAll(PDO::FETCH_OBJ);
    return $people;
  }

  function addAccounts($user){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
      $affectedRows = $connection->exec(
        "INSERT INTO accounts VALUES ('".$user->getIdAcount()."','".$user->getUsername()."','" .$user->getPassword().
        "','".$user->getFirst_name()."','".$user->getLast_name()."','" .$user->getAge()."'
        ,'".$user->getGender()."','".$user->getEmail()."','" .$user->getPhone()."','".$user->getAddress().
        "','".$user->getId()."','" .$user->getType()."','" .$user->getImage()."','".$user->getStatus()."')"
      );

  }
  function deleteAccounts($id_ac){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
    $affectedRows = $connection->exec( "DELETE FROM accounts WHERE id_ac='$id_ac' and status='b'");
  }


  function updateAccount($id_ac,$status){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
    $sql = "UPDATE accounts SET status='".$status."' WHERE id_ac='".$id_ac."'";
    $affectedRows = $connection->exec($sql);
  }

  function updateAccounts($user){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');

    $statement = $connection->query('SELECT * FROM accounts WHERE id_ac="'.$user->getIdAcount().'"');
    while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $user2 = new Account($row['id_ac'],$row['username'],$row['password'],$row['first_name'],$row['last_name'],$row['age']
      ,$row['gender'],$row['email'],$row['phone'],$row['address'],$row['ID'],$row['type'],$row['image'],$row['status']);
    }
    // echo $user2->getPassword();
    // echo "<br>";
    // echo $user->getPassword();
    // echo "<br>";
    if ($user2->getPassword()==$user->getPassword()){
      $sql = "UPDATE accounts SET  first_name='".$user->getFirst_name().
      "',last_name='".$user->getLast_name()."' ,age='".$user->getAge()."', gender='".$user->getGender()."',email='".$user->getEmail().
      "' ,phone='".$user->getPhone()."',address='".$user->getAddress()."',id='".$user->getId()."' , type='".$user->getType()."',image='".$user->getImage().
      "' WHERE id_ac='".$user->getIdAcount()."'";
      $affectedRows = $connection->exec($sql);


    }else{
      $passhash=password_hash($user->getPassword(), PASSWORD_DEFAULT);

      $sql = "UPDATE accounts SET  password='".$passhash."',first_name='".$user->getFirst_name().
      "',last_name='".$user->getLast_name()."' ,age='".$user->getAge()."', gender='".$user->getGender()."',email='".$user->getEmail().
      "' ,phone='".$user->getPhone()."',address='".$user->getAddress()."',id='".$user->getId()."' , type='".$user->getType()."',image='".$user->getImage().
      "' WHERE id_ac='".$user->getIdAcount()."'";
      $affectedRows = $connection->exec($sql);
    }

  }

  function loadAttendantIDAC($id_ac){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
    $statement = $connection->query('SELECT * FROM attendants  WHERE  id_ac="'.$id_ac.'"');
    $attendants = array();
    $count = 0;
    while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $attendant = new Attendant($row['id_at'],$row['id_ev'],$row['id_ac'],$row['image1'],$row['image2'],$row['num'],$row['status']);
      $attendants[$count] = $attendant;
      $count = $count + 1;
    }
    return $attendants;
  }


  function loadAttendants($id_ev){

    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
    $statement = $connection->query('SELECT * FROM attendants  WHERE  id_ev="'.$id_ev.'"');
    $attendants = array();
    $count = 0;
    while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $attendant = new Attendant($row['id_at'],$row['id_ev'],$row['id_ac'],$row['image1'],$row['image2'],$row['num'],$row['status']);
      $attendants[$count] = $attendant;
      $count = $count + 1;
    }
    return $attendants;
  }
  function loadAttendant($id_at){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
    $statement = $connection->query('SELECT * FROM attendants WHERE id_at="'.$id_at.'"');
    while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $attendant = new Attendant($row['id_at'],$row['id_ev'],$row['id_ac'],$row['image1'],$row['image2'],$row['num'],$row['status']);
      return $attendant;
    }
  }


  function addAttendant($attendant){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
      $affectedRows = $connection->exec(
        "INSERT INTO attendants VALUES ('".$attendant->get_id_at()."','".$attendant->get_id_ev()."','" .$attendant->get_id_ac().
        "','".$attendant->get_image1()."','".$attendant->get_image2()."','".$attendant->get_num()."','".$attendant->get_status()."')"
      );
  }

  function updateAttendant($attendant,$status){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
    $sql = "UPDATE attendants SET status='".$status."' WHERE id_at='".$attendant->get_id_at()."'";
    $affectedRows = $connection->exec($sql);
  }

  function deleteAttendant($id_at){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
    $affectedRows = $connection->exec( "DELETE FROM attendants WHERE id_at='$id_at'");
  }

  function loadProfile($username){
      $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
      $statement = $connection->query('SELECT * FROM accounts WHERE username="' . $username.'"');
      while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $user = new Account($row['id_ac'],$row['username'],$row['password'],$row['first_name'],$row['last_name'],$row['age']
        ,$row['gender'],$row['email'],$row['phone'],$row['address'],$row['ID'],$row['type'],$row['image'],$row['status']);
        $_SESSION['user']=$user;
        return $user;
      }
    }

  function loadEvent($id_ev){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
    $statement = $connection->query('SELECT * FROM events WHERE id_ev="'.$id_ev.'"');
    $event;
    while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $event = new Event($row['id_ev'],$row['id_ac'],$row['name_event'],$row['detail'],$row['image'],$row['teaser_VDO'],$row['date'],$row['time'],$row['location'],$row['map'],$row['current_capacity']
      ,$row['capacity'],$row['free'],$row['type'],$row['precondition'],$row['create_time'],$row['status'],$row['google_form_url']);
      return $event;
    }
  }

  function loadEvents(){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
    $statement = $connection->query('SELECT * FROM events WHERE status="y" ORDER BY id_ev DESC' );
    $events = array();
    $count = 0;
    while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $event = new Event($row['id_ev'],$row['id_ac'],$row['name_event'],$row['detail'],$row['image'],$row['teaser_VDO'],$row['date'],$row['time'],$row['location'],$row['map'],$row['current_capacity']
      ,$row['capacity'],$row['free'],$row['type'],$row['precondition'],$row['create_time'],$row['status'],$row['google_form_url']);
      $events[$count] = $event;
      $count = $count + 1;
    }

    return $events;
  }


  function updateEvent($event){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
    $sql = "UPDATE events SET name_event='".$event->get_name_event()."', detail='".$event->get_detail()."',image='".$event->get_image().
    "',teaser_VDO='".$event->get_teaser_VDO()."' ,date='".$event->get_date()."', time='".$event->get_time()."',location='".$event->get_location().
    "' ,map='".$event->get_map()."',current_capacity='".$event->get_current_capacity()."',capacity='".$event->get_capacity()."',free='".$event->get_free()."' , type='".$event->get_type().
    "' , precondition='".$event->get_precondition()."' , create_time='".$event->get_create_time()."' , status='".$event->get_status()."' , google_form_url='".$event->get_google_form_url().
    "' WHERE id_ev='".$event->get_id_ev()."'";
    $affectedRows = $connection->exec($sql);
  }


  function updateEventStatus($id_ev,$status){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
    $sql = "UPDATE events SET status='".$status.
    "' WHERE id_ev='".$id_ev."'";
    $affectedRows = $connection->exec($sql);
  }


  function searchEvents($id_ac){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
    $statement = $connection->query("SELECT * FROM events WHERE id_ac='$id_ac'");
    $statement->execute();
    $people = $statement->fetchAll(PDO::FETCH_OBJ);
    return $people;
  }

  function addEvents($event){
      $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
        $affectedRows = $connection->exec(
          "INSERT INTO events VALUES ('"."','".$event->get_id_ac()."','" .$event->get_name_event().
          "','".$event->get_detail()."','".$event->get_image()."','" .$event->get_teaser_VDO()."'
          ,'".$event->get_date()."','".$event->get_time()."','" .$event->get_location()."','".$event->get_map().
          "','".$event->get_current_capacity()."','".$event->get_capacity()."','" .$event->get_free().
          "','" . $event->get_type()."','".$event->get_precondition()."','".$event->get_create_time()."','".$event->get_status()."','".$event->get_google_form_url()."')"
        );

  }

  function loadLogs(){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
    $statement = $connection->query('SELECT * FROM logs');
    $logs = array();
    $count = 0;
    while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $log = new Event($row['id_lo'], $row['id_ac'], $row['event'], $row['date'], $row['time']);
      $logs[$count] = $log;
      $count = $count + 1;
    }

    return $logs;
  }

  function loadComments($id_ev){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
    $statement = $connection->query('SELECT * FROM comments WHERE id_ev='.$id_ev);
    $comments = array();
    $count = 0;
    while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $comment = new Comment($row['id_co'], $row['id_ac'], $row['id_ev'], $row['message'], $row['date'], $row['time']);
      $comments[$count] = $comment;
      $count = $count + 1;
    }

    return $comments;
  }

  function loadUsername($id_ac){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
    $statement = $connection->query('SELECT username FROM accounts WHERE id_ac="'.$id_ac.'"');
    $username;
    while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $username = $row['username'];
      return $username;
    }
  }

  function addComment($comment){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
      $affectedRows = $connection->exec(
        "INSERT INTO comments VALUES ('".$comment->get_id_co()."','".$comment->get_id_ac()."','" .$comment->get_id_ev().
        "','".$comment->get_message()."','".$comment->get_date()."','" .$comment->get_time()."')"
      );
  }

  function vertifyUser($username){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
    $qurry = 'UPDATE accounts SET status="y" WHERE username="'.$username.'"';
    $connection->exec($qurry);
  }
  function deleteComment($id_co){
    $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
    $affectedRows = $connection->exec('DELETE FROM comments WHERE id_co='.$id_co);
  }
  function checkEventOfAccount($id_ev){
      $connection = new PDO('mysql:host=localhost;dbname=project;charset=utf8mb4','admin','admin1234');
      $statement = $connection->query('SELECT * FROM accounts,events WHERE events.'.'id_ev='.$id_ev.' AND events.'.'id_ac=accounts.'.'id_ac');
          while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
              $user=new Account($row['id_ac'],$row['username'],$row['password'],$row['first_name'],$row['last_name'],$row['age']
              ,$row['gender'],$row['email'],$row['phone'],$row['address'],$row['ID'],$row['type'],$row['image'],$row['status']);
              return $user;
            }
    }



}

 ?>
