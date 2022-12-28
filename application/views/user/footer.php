</body>
<style>
	.spruce{
		background-color:#005960 !important;
		color:#fff !important;
	}
	.text-spruce{
		color:#005960 !important;
	}
	.hover-spruce:hover{
		background-color:#005960 !important;
		color:#fff !important;
	}
</style>

<script>
	$(document).ready(function(){
		$("#bars").click(function(){
			$(".control-panel").toggle('1000');
			$(".control-div").toggleClass("col-lg-10 col-lg-12");
		});
	});
</script>
</html>