// JavaScript Document

function myfun(bid)
{
	var del = confirm("Are you sure you wish to delete the record "+bid+"?");
	if(del == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}

