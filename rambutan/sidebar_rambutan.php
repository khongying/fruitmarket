
<ul class="nav nav-tabs">
    <li class="nav-item" id="1_step">
        <a id="step_1" class="nav-link" href="#">การปลูก</a>
    </li>

    <li class="nav-item" id="2_step">
        <a id="step_2" class="nav-link" href="#">การใส่ปุ๋ย</a>
    </li>

    <li class="nav-item" id="3_step">
        <a id="step_3" class="nav-link" href="#">การกำจัดศัตรูพืช</a>
    </li>

    <li class="nav-item" id="4_step">
        <a id="step_4" class="nav-link" href="#">การเก็บเกี่ยวผลผลิต</a>
    </li>
</ul>



<script type="text/javascript">
$( document ).ready(function() {
	function show_step_1(){
		$.get('rambutan/rambutan_step_1.php', function(data) {
		}).done(function(data){
			$("#detail").html(data);
		});
	}
	function show_step_2(){
		$.get('rambutan/rambutan_step_2.php', function(data) {
		}).done(function(data){
			$("#detail").html(data);
		});
	}
	function show_step_3(){
		$.get('rambutan/rambutan_step_3.php', function(data) {
		}).done(function(data){
			$("#detail").html(data);
		});
	}
	function show_step_4(){
		$.get('rambutan/rambutan_step_4.php', function(data) {
		}).done(function(data){
			$("#detail").html(data);
		});
	}

	$("#step_1").click(function(){
    	$("#1_step").attr({
        "class" : "active"
    	});

		$("#2_step").attr({
        "class" : " "
    	});
    	$("#3_step").attr({
        "class" : " "
    	});
    	$("#4_step").attr({
        "class" : " "
    	});

		show_step_1();
	});

	$("#step_2").click(function(){
		$("#2_step").attr({
        "class" : "active"
    	});

    	$("#1_step").attr({
        "class" : " "
    	});
    	$("#3_step").attr({
        "class" : " "
    	});
    	$("#4_step").attr({
        "class" : " "
    	});
		show_step_2();
	});

	$("#step_3").click(function(){
		$("#3_step").attr({
        "class" : "active"
    	});

    	$("#1_step").attr({
        "class" : " "
    	});
    	$("#2_step").attr({
        "class" : " "
    	});
    	$("#4_step").attr({
        "class" : " "
    	});
		show_step_3();
	});

	$("#step_4").click(function(){
		$("#4_step").attr({
        "class" : "active"
    	});

    	$("#1_step").attr({
        "class" : " "
    	});
    	$("#2_step").attr({
        "class" : " "
    	});
    	$("#3_step").attr({
        "class" : " "
    	});
		show_step_4();
	});
});
	
</script>