<?php
    if (!isset($_POST['submit'])) {
        header("Location: index.php");
    } else {
        //Taking all the variables from the post superglobal
        $name = $_POST['name'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $gender = $_POST['flexRadioDefault'];
        $country = $_POST['country'];


        $userData = array(
            ['Name', 'Email', 'Date of birth', 'Gender', 'Location'],
            [$name, $email, $dob, $gender, $country]
        );
        $fp = fopen('userdata.csv', 'w');
            foreach ($userData as $fields) {
                fputcsv($fp, $fields);
            }
              
            fclose($fp);
            session_start();
            $_SESSION['userdata'] = $userData;
            header("Location: index.php?signup=success");
            
        }
