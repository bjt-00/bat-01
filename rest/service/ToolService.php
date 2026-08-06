<?php

class ToolService
{
    function getToolList($search)
    {
        $conn = mysqli_connect(
            "localhost",
            "root",
            "fatima",
            "shared_tools"
        );

        if ($search == "*")
        {
            $sql = "SELECT * FROM shared_tools";
        }
        else
        {
            $sql = "SELECT * FROM shared_tools WHERE id=" . $search;
        }

        $result = mysqli_query($conn, $sql);

        $tools = array();

        while ($row = mysqli_fetch_assoc($result))
        {
            $tools[] = $row;
        }

        return json_encode($tools);
    }

    function updateTool($id, $toolName)
    {
        $conn = mysqli_connect(
            "localhost",
            "root",
            "fatima",
            "shared_tools"
        );

        $sql = "UPDATE shared_tools
                SET tool_name='$toolName'
                WHERE id=$id";

        $result = mysqli_query($conn, $sql);

        if ($result)
        {
            return json_encode(array(
                "status" => "success",
                "message" => "Tool Updated Successfully"
            ));
        }
        else
        {
            return json_encode(array(
                "status" => "error",
                "message" => "Update Failed"
            ));
        }
    }

    function deleteTool($id)
    {
        $conn = mysqli_connect(
            "localhost",
            "root",
            "fatima",
            "shared_tools"
        );

        $sql = "DELETE FROM shared_tools
                WHERE id=$id";

        $result = mysqli_query($conn, $sql);

        if ($result)
        {
            return json_encode(array(
                "status" => "success",
                "message" => "Tool Deleted Successfully"
            ));
        }
        else
        {
            return json_encode(array(
                "status" => "error",
                "message" => "Delete Failed"
            ));
        }
    }
}

?>