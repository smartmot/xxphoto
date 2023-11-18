<div>
    <form action="#" enctype="multipart/form-data">

    </form>
</div>
<button id="btn1">Click me</button>
<div class="w-300 h-320">
    <img id="img1" class="wp-100" alt="" src="{{ asset("image/001.jpg") }}" />
</div>
<script type="text/javascript">
    $("#btn1").click(()=>{
        const cropper = new Cp("#img1", {
            aspectRatio:1
        });
        cropper.start();
    });


    setTimeout(function (){

    },200)

</script>
