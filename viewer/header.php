<?php session_start(); ?>
<html>
<HEAD>
<SCRIPT LANGUAGE="JScript">
var id;
function StartGlide()javascript:selectAll('form.s1')
{
    Banner.style.pixelLeft = 
    document.body.offsetWidth;
    Banner.style.visibility = "visible";
    id = window.setInterval("Glide()",50);
}
function Glide()
{
    Banner.style.pixelLeft -= 10;
    if (Banner.style.pixelLeft<=0) {
        Banner.style.pixelLeft=0;
        window.clearInterval(id);
    }
}
</SCRIPT>
</HEAD>
<body onload="mainform = document.mainform; p = mainform.p; z1 = mainform.z1; z2 = mainform.z2;">

<script language=javascript>
	function previouspage()
	{
		if (p.value > 1)
		{
			p.value--;
			mainform.submit();
		}
	}
	function nextpage()
	{
		if (p.value < <?= $_SESSION['Pages'] ?>)
		{
			p.value++;
			mainform.submit();
		}
		
	}
	function setpage(pg)
	{
		p.value = pg;
		mainform.submit();
	}

	function zoomout()
	{
		if (z1.value > 1)
		{
			z2.value = z1.value;
			z1.value--;
			mainform.submit();
			z2.value = z1.value;
		}
	}

	function zoomin()
	{
		if (z1.value < <?= $_SESSION['max_zoom_level'] ?>)
		{
			z2.value = z1.value;
			z1.value++;
			mainform.submit();
			z2.value = z1.value;
		}
	}
	
</script>

<form name=mainform action=view.php method=get target=downtarget>
	<input type=hidden name="p" value=<?= $_SESSION['pageid'] ?>>
	<input type=hidden name="z1" value=<?= $_SESSION['zoom'] ?>>
	<input type=hidden name="z2" value=1>
</form>
<a href="javascript:zoomin()"><img src='../images/icons/magnifier+.png' border=0></a><br><?php // Agrandar ?>
<a href="javascript:zoomout()"><img src='../images/icons/magnifier-.png' border=0></a><br><?php // Disminuir ?>

<a href="javascript:previouspage();"><img src='../images/icons/arrow_left.png' border=0></a><br> <?php // Anterior ?>
<a href="javascript:nextpage();"><img src='../images/icons/arrow_right.png' border=0></a><br> <?php // Siguiente ?>

<?php
/*
	for ($i = 1; $i <= $_SESSION['Pages']; $i++)
		echo "<a href='javascript:setpage($i);'>P. $i</a><br>"
	
		*/
?>
<?php // <a href="javascript:nextpage();"><img src='../images/icons/arrow_right.png' border=0></a><br> <?php // Siguiente ?> 
</body>
</html>

