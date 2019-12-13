<?php

// Enabling error reporting
error_reporting(-1);
ini_set('display_errors', 'On');

require_once __DIR__ . '\..\Services\Firebase.php';
require_once __DIR__ . '/../Utils/Util.php';

$firebase = new Firebase();
$util = new Util();

// Notification title
$title = isset($_POST['title']) ? $_POST['title'] : '';


// Notification message
$message = isset($_POST['message']) ? $_POST['message'] : '';

// Notification topic
$topic = isset($_POST['notification_type']) ? $_POST['notification_type'] : '';


// Optional playload
$payload = array();
$payload['article_data'] = isset($_GET['article_data']) ? $_GET['article_data'] : '';



if($topic !== 'empty'){

  $util->setTitle($title);
  $util->setMessage($message);
  $util->setTopic($topic);
  $util->setIsBackground(FALSE);
  $util->setPayload($payload);

  $json = $util->getUtils();
  $response = $firebase->sendToTopic($topic, $json);

}else{
  echo "Topic isn't selected.";

    $json = '';
    $response = '';

}

?>

<html>
<head>
  <title>Firebase notification sending report</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../Style/style.css"/>
</head>
<body>
  <form method= "post" action="../UI/NotificationPage.php">
    <fieldset>
      <legend>Notification::</legend>
      <button type="submit" class="send_button">Reset</button>

    <div class="container">
        <div class="fl_window">
            <div><img src="https://1.bp.blogspot.com/-YIfQT6q8ZM4/Vzyq5z1B8HI/AAAAAAAAAAc/UmWSSMLKtKgtH7CACElUp12zXkrPK5UoACLcB/s1600/image00.png" width="200" alt="Firebase"/></div>
            <br/>
            <?php if ($json != '') { ?>
                <label><b>Request:</b></label>
                <div class="json_preview">
                    <pre><?php echo json_encode($json) ?></pre>
                </div>
            <?php }else{
              echo "Topic isn't selected.";
            } ?>
            <br/>
            <?php if ($response != '') { ?>
                <label><b>Response:</b></label>
                <div class="json_preview">
                    <pre><?php echo json_encode($response) ?></pre>
                </div>
            <?php } ?>

        </div>
    </fieldset>
  </form>
</body>
</html>
