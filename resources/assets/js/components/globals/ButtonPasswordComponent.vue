<template>
<button v-on:click="checkFunc" id="buttonp" value="true" type="button" class="btn btn-default"><i class="fa fa-eye-slash"></i>
                                        </button>
</template>

<script>
    export default {
        methods: {
            checkFunc(){
                if ($("#buttonp").val()=="true"){
                     $("#password").attr("type", "text");
                    
                     $("#buttonp").val("false")
                }else{
                      $("#buttonp").val("true");
                      
                      $("#password").attr("type", "password");
                }
              $("#buttonp > i").toggleClass('fa-eye-slash fa-eye');
              

            }
        
     }
    }
</script>
