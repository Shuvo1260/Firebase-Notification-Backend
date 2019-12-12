<?php  ?>
<html>
  <head>
    <title>Firebase Notification</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style/style.css"/>
  </head>


  <body>
    <form method= "post" action="Services/NotificationService.php" >
      <fieldset>
        <legend>Notification::</legend>
        <label>Title</label></br>
        <textarea name="title" class="title_box" placeholder="Notification title"></textarea></br></br>
        <label>Message</label></br>
        <textarea name="message" class=" message_box" placeholder="Notification message"></textarea></br></br>
        <button type="submit" class="pure-button pure-button-primary send_button">Send</button>
      </fieldset>
    </form>
  </body>

</html>
