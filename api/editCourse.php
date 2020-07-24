<?php

    // header 
    // allowing all connections
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');  // it becomes put
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    // initializing api
    include_once('../core/initialize.php');

    // get raw posted data
    $data = json_decode(file_get_contents("php://input"));

    // initializing course class
    $course = new Course($db, $data->course_title, $data->course_description, $data->course_deadline);

    $course->setID($data->id);
   

    // create course
    if($course->updateCourse()){
        echo json_encode(
            array(
                'message' => 'Course updated!'
            )
        );
    }else{
        echo json_encode(
            array(
                'message' => 'Course NOT updated!'
            )
        );
    }


?>
