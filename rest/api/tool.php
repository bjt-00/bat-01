<?php

include '../controller/ToolController.php';

$toolController = new ToolController();

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    $search = $_GET['search'] ?? '*';

    echo $toolController->getToolList($search);
}

if($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    $data = json_decode(file_get_contents("php://input"), true);

    $id = $_GET['id'];

    $toolName = $data['tool_name'];

    echo $toolController->updateTool($id, $toolName);
}

if($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
    $id = $_GET['id'];

    echo $toolController->deleteTool($id);
}

?>