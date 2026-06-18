<!-- poll start here -->
<div class="sidearce bor-radius backwhite pad20 ovfl">
    <div class="ri-headingRt">
        <h2><span><div>POLL</div></span></h2>
    </div>
    <form method="post" name="pollForm">
        <h3 class="poll-head">{{$pollQuestion['pollQuestion']}}</h3>
        <ul class="ri-poll-list">
            <li><input type="radio" name="poll"
                       value="{{$pollAnswers[0]['pollAnswervalue']}}"> {{$pollAnswers[0]['pollAnswervalue']}}
            </li>
            <div id="vote1"></div>
            <div id="graph1"></div>

            <li><input type="radio" name="poll"
                       value="{{$pollAnswers[1]['pollAnswervalue']}}"> {{$pollAnswers[1]['pollAnswervalue']}}
            </li>
            <div id="vote2"></div>
            <div id="graph2"></div>

            <li><input type="radio" name="poll"
                       value="{{$pollAnswers[2]['pollAnswervalue']}}"> {{$pollAnswers[2]['pollAnswervalue']}}
            </li>
            <div id="vote3"></div>
            <div id="graph3"></div>

            <li><input type="radio" name="poll"
                       value="{{$pollAnswers[3]['pollAnswervalue']}}"> {{$pollAnswers[3]['pollAnswervalue']}}
            </li>
            <div id="vote4"></div>
            <div id="graph4"></div>


        </ul>
    <input type="button" class="pollbtn" value="" id="pollSubmit" name="submit"><br>

        <div id="voted" style="display: none"><font color="red"><b>Already voted..!</b></font></div>

        <input type="button" class="buttonRes" value="" id="pollAnswer" name="pollAnswer"></form>
</div>
<!--poll end here -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#pollSubmit').click(function () {

            var ans = $("input[name='poll']:checked").val();

            $.ajax({
                type   : 'post',
                url    : '/wivote',
                data   : {poll : ans },
                success: function (data)
                {
                    if (data == 'voted') {
                        document.getElementById("voted").style.display = "block";
                        document.getElementById("vote1").style.display = "none";
                        document.getElementById("vote2").style.display = "none";
                        document.getElementById("vote3").style.display = "none";
                        document.getElementById("vote4").style.display = "none";

                        document.getElementById("graph1").style.display = "none";
                        document.getElementById("graph2").style.display = "none";
                        document.getElementById("graph3").style.display = "none";
                        document.getElementById("graph4").style.display = "none";
                    }

                    else {
                        document.getElementById("vote1").innerHTML = (data.point1 + " %");
                        document.getElementById("vote2").innerHTML = (data.point2 + " %");
                        document.getElementById("vote3").innerHTML = (data.point3 + " %");
                        document.getElementById("vote4").innerHTML = (data.point4 + " %");

                        document.getElementById("graph1").innerHTML = (data.point5);
                        document.getElementById("graph2").innerHTML = (data.point6);
                        document.getElementById("graph3").innerHTML = (data.point7);
                        document.getElementById("graph4").innerHTML = (data.point8);
                    }
                    /*setTimeout(function(){
                        $("#voted").hide();
                        $("#vote1").hide();
                        $("#vote2").hide();
                        $("#vote3").hide();
                        $("#vote4").hide();
                    }, 1000);*/
                }
            });
        });

    });

    $(document).ready(function () {
        $('#pollAnswer').click(function () {
            $.ajax({
                type   : 'post',
                url    : '/wiviewresult',
                data   : {},
                success: function (data)
                {
                    document.getElementById("vote1").innerHTML     = (data.point1 + " %");
                    document.getElementById("vote2").innerHTML     = (data.point2 + " %");
                    document.getElementById("vote3").innerHTML     = (data.point3 + " %");
                    document.getElementById("vote4").innerHTML     = (data.point4 + " %");

                    document.getElementById("voted").style.display = "none";
                    document.getElementById("vote1").style.display = "block";
                    document.getElementById("vote2").style.display = "block";
                    document.getElementById("vote3").style.display = "block";
                    document.getElementById("vote4").style.display = "block";

                    document.getElementById("graph1").innerHTML    = (data.point5);
                    document.getElementById("graph2").innerHTML    = (data.point6);
                    document.getElementById("graph3").innerHTML    = (data.point7);
                    document.getElementById("graph4").innerHTML    = (data.point8);

                    document.getElementById("graph1").style.display = "block";
                    document.getElementById("graph2").style.display = "block";
                    document.getElementById("graph3").style.display = "block";
                    document.getElementById("graph4").style.display = "block";

                    /* setTimeout(function(){
                     $("#vote1").hide();
                     $("#vote2").hide();
                     $("#vote3").hide();
                     $("#vote4").hide();
                     }, 2000);*/
                }
            });
        });

    });

</script>