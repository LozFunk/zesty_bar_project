<?php
include 'config/DB.php';

if($_SERVER['REQUEST_METHOD']=== "POST" && isset($_POST['submit'])){
    $f_name = trim($_POST['f_name']);
    $l_name = trim($_POST['l_name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $phone = trim($_POST['phone']);
    $res_date = $_POST['res_date'];
    $res_time = $_POST['res_time'];
    $guests = $_POST['num_guests'];
    $notes = trim($_POST['notes']);

    if(!empty($f_name) && !empty($l_name) && !empty($email) && !empty($res_date) && !empty($res_time) && !empty($guests)){
        $stmt = $db->prepare('INSERT INTO reservations (first_name, last_name, email, phone_num, res_date, res_time, num_guests, notes) VALUES (:first_name, :last_name, :email, :phone_num, :res_date, :res_time, :num_guests, :notes)');

        $stmt->bindValue(':first_name', $f_name);
        $stmt->bindValue(':last_name', $l_name);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':phone_num', $phone);
        $stmt->bindValue(':res_date', $res_date);
        $stmt->bindValue(':res_time', $res_time);
        $stmt->bindValue(':num_guests', $guests);
        $stmt->bindValue(':notes', $notes);

        if($stmt->execute()){
            $success = "Reservation successfully submitted!";
        }else{
            $error = "Something went wrong. Please try again.";
        }
    }else{
        $error = "Please fill in all required fields";
    }
}


?>



<div class="paper-container">
<div class="reservation-banner">
<h1>reservation</h1>        
</div>

<p class="mar-bot">Sip in style—book your table now and let the cocktails come to you.</p>

<main class="contact-form column">
        

<div class="">
    <h3>Secure your seat at Zesty Cocktail Bar and elevate your evening.</h3>
    <p>Whether you're planning a night out with friends, a date to remember, or a special celebration, we’re here to make it unforgettable. Our intimate space fills up quickly, especially on weekends, so we recommend reserving your table in advance. From signature cocktails to seasonal creations, our expert mixologists are ready to craft drinks that match your mood. Book your reservation now and step into an ambiance of music, flavor, and elegance—where every moment is shaken, stirred, and served with style.</p>
</div>

<form class="reservation-form" method="post">   
<?php
    if (isset($success)) {
        echo "<p class='success'>$success</p>";
    }
    if (isset($error)) {
        echo "<p class='error'>$error</p>";
    }
?>
    
    <div class="res-container">


    <input name="f_name" type="text" class="reservation-input" placeholder="First name*"> 
    <input name="l_name" type="text" class="reservation-input" placeholder="Last name*"> 
    </div>

    <div class="res-container">
    <input name="email" type="text" class="reservation-input" placeholder="Email*">
    <input type="number" name="phone" placeholder="Phone" class="reservation-input">
    </div>



    <div class="date">
    <input type="date" name="res_date" value="<?=date('Y-m-d')?>" class="">

    <input type="time" name="res_time" class="feedback-input" class="">

    <input type="number" name="num_guests" class="feedback-input" placeholder="Number of guests*" min="1">
    </div>
    

    <textarea name="notes" class="feedback-input" placeholder="Notes" rows="4"></textarea>
    

    <input type="submit" name="submit" value="RESERVE NOW" class="submit-btn">
</form>
    
</main>