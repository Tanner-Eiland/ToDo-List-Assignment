<?php
    include('model/database.php');
    include('model/todolist_db.php');

    $ItemNum = filter_input(INPUT_POST, 'ItemNum', FILTER_VALIDATE_INT);


$Description = filter_input(INPUT_POST, "Description", FILTER_UNSAFE_RAW);

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if(!$action){
        $action = 'create_read_form';
    }
}

$Title = filter_input(INPUT_POST, "Title", FILTER_UNSAFE_RAW);
if(!$Title){
    $Title = filter_input(INPUT_GET, "Title", FILTER_UNSAFE_RAW);
}
    
switch($action){
    case 'select':
        if($Title){
            $results = select_item_by_title($Title);
            include('view/create_read_form.php');
        }else{
            $error_message = "invalid item data. Check all fields.";
            include('view/error.php');
        }
        break;
    case 'insert':
        if($Title && $Description){
            $count = insert_item($Title, $Description);
            header("Location: .?created={$count}");
        }else{
            $error_message = "invalid item data. Check all fields.";
            include('view/error.php');
        }
        break;
    case 'update':
        if($ItemNum && $Title && $Description){
            $count = update_item($ItemNum, $Title, $Description);
            header("Location: .?updated={$count}");
        }else{
            $error_message = "invalid item data. Check all fields.";
            include('view/error.php');
        }
        break;
    case 'delete':
        if($ItemNum){
            $count = delete_item($ItemNum);
            header("Location: .?deleted={$count}");
        }
        break;
    default:
    //begin by showing all items in todolist database
    $results = select_all_items();
        include('view/create_read_form.php');
    
}






?>