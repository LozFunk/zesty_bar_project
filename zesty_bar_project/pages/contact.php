<?php
include 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])){
    $name = trim($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $phone = trim($_POST['phone']);
    $message = $_POST['message'];


if(!empty($name) && !empty($email) && !empty($message)){
    $stmt = $db->prepare('INSERT INTO guest_feedback (name, email, phone_num, message)
                                                    VALUES (:name, :email, :phone, :message)');

    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':phone', $phone);
    $stmt->bindValue(':message', $message);

    if($stmt->execute()){
        $success = "Your message has been sent!";
    }else{
        $error = "Something went wrong. Please try again.";
    }

}else{
    $error = "Please fill in all required fields";
    }
}
?>

<div class="paper-container">
<div class="contact-banner">
        <h1>Contact Us</h1>        
</div>

<p class="mar-bot">Whether you're booking a private event, have a burning cocktail question, or just want to say hi — we'd love to hear from you.</p>

<main class="contact-form">


<form method="post">      

<?php
if (isset($success)) {
    echo "<p class='success'>$success</p>";
}
if (isset($error)) {
    echo "<p class='error'>$error</p>";
}
?>


    <input name="name" type="text" class="feedback-input" placeholder="Name*"> 

    <input name="email" type="text" class="feedback-input" placeholder="Email*">
    <input type="number" name="phone" placeholder="Phone">

    <textarea name="message" class="feedback-input" placeholder="Message*" rows="8"></textarea>
    
    <input type="submit" name="submit" value="SUBMIT" class="submit-btn">
</form>




        <section>
            <div>
            <h3>Where to find us</h3>
            <h5>Zesty Cocktail Bar</h5>
            <p>
            Holtenaur Str. 100
            <br>
            Loft District
            <br>
            24105 Kiel</p>
            </div>

            <iframe width="320" height="280" id="gmap_canvas" src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=holtenaur%20str%20100%20kiel+()&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe> <a href='https://www.betriebshaftpflicht.at/' class="d-none">Betrieb-Haftpflichtversicherung</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=e349ea53d39dd9f0077cf8b41752793486782819'></script>
                
        </section>
    </main>