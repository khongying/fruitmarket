
<ul class="nav nav-tabs">
    <li class="nav-item" id="1_step">
        <a id="step_1" class="nav-link" href="#">การเตรียมก่อนปลูก</a>
    </li>

    <li class="nav-item" id="2_step">
        <a id="step_2" class="nav-link" href="#">การให้น้ำและใส่ปุ๋ย</a>
    </li>

    <li class="nav-item" id="3_step">
        <a id="step_3" class="nav-link" href="#">การดูแลต้นลองกอง</a>
    </li>
</ul>



<script type="text/javascript">
$( document ).ready(function() {
	function show_step_1(){
		$.get('longkong/longkong_step_1.php', function(data) {
		}).done(function(data){
			$("#detail").html(data);
		});
	}
	function show_step_2(){
		$.get('longkong/longkong_step_2.php', function(data) {
		}).done(function(data){
			$("#detail").html(data);
		});
	}
	function show_step_3(){
		$.get('longkong/longkong_step_3.php', function(data) {
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
});
	
</script>