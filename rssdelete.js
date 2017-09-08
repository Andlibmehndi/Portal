function myrss_delete(id)
{
	var del = confirm("Are you sure you wish to delete the record "+id+"?");
	if(del == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}

