<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<div id="new_pop" style="width:fit-content;height:100%;position:absolute;" >
    <img style="" src="https://cdn.epnc.co.kr/news/photo/202204/222184_222943_3528.jpg" width="250" height="300"/>
    <div style="width:100%;height:20px;position:relative;">
        <a href="javascript:void(0);" onclick="exit2()" style="font-weight: bold; position: absolute; right:60px;">하루동안 보지 않기</a>
        <input type="checkbox" name="layer_close" style="position:absolute; right:40px;top:3px;"/>
        <a href="javascript:void(0);" onclick="exit()" style="font-weight: bold; position: absolute; right: 10px;">X</a>
    </div>
</div>
<script>
    $(document).ready(function(){
        cookiedata = document.cookie;
        if(cookiedata.indexOf("close=Y")<0){
            $("#new_pop").show();
        }else{
            window.open('','_self').close();
            $("#new_pop").hide();
        }
    });

    function exit(){
        if($("input[name=layer_close]").is(":checked") == true){
            setCookie("close","Y",1);
        }

        $("#new_pop").hide();
        window.open('','_self').close();
    }

    function exit2(){
        $("#new_pop").hide();
        window.open('','_self').close();
        setCookie("close","Y",1);
    }

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000)); //시간설정
        var expires = "expires="+d.toUTCString(); var temp = cname + "=" + cvalue + "; " + expires;
        document.cookie = temp;
    }
</script>