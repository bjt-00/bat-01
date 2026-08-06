<?php

include '../service/ToolService.php';

class ToolController
{
    function getToolList($search)
    {
        $toolService = new ToolService();

        return $toolService->getToolList($search);
    }

    function updateTool($id, $toolName)
    {
        $toolService = new ToolService();

        return $toolService->updateTool($id, $toolName);
    }
	function deleteTool($id)
	{
	    $toolService = new ToolService();

	    return $toolService->deleteTool($id);
	}
}

?>
