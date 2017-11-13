@section('css')


@endsection
 
<div id="app"> 
<aside id="sidebar_secondary" class="tabbed_sidebar ng-scope chat_sidebar">
<div class="popup-head">
                <div class="popup-head-left pull-left"><a Design and Developmenta title="Gurdeep Osahan (Web Designer)" target="_blank" href="https://web.facebook.com/iamgurdeeposahan">
<img class="md-user-image" alt="Gurdeep Osahan (Web Designer)" title="Gurdeep Osahan (Web Designer)" src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" title="Gurdeep Osahan (Web Designer)" alt="Gurdeep Osahan (Web Designer)">
<h1>Gurdeep Osahan</h1><small><br> <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Web Designer</small></a></div>
                      <div class="popup-head-right pull-right">
                        <button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button"><i class="glyphicon glyphicon-remove"></i></button>
                      </div>
              </div>
<div id="chat" class="chat_box_wrapper chat_box_small chat_box_active" style="opacity: 1; display: block; transform: translateX(0px);">
            <div class="chat_box touchscroll chat_box_colors_a">


                <?php if(Session::get('cusId')){ ?>            
                    <div v-for="sms in messeges">        
                        <div v-if="sms.from_id == <?php echo Session::get('cusId'); ?>">    
                            <div class="chat_message_wrapper chat_message_right">
                                <div class="chat_user_avatar">
                                <a href="https://web.facebook.com/iamgurdeeposahan" target="_blank" >
                                    <img alt="Gurdeep Osahan (Web Designer)" title="Gurdeep Osahan (Web Designer)" src="http://placehold.it/50/FA6F57/fff&amp;text=ME" class="md-user-image">
                                </a>
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p>
                                            @{{sms.messege}}
                                            <span class="chat_message_time">@{{sms.created_at}}</span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        

                        <div v-else> 
                            <div class="chat_message_wrapper">
                                <div class="chat_user_avatar">
                                    <a href="https://web.facebook.com/iamgurdeeposahan" target="_blank" >
                                    <img alt="Gurdeep Osahan (Web Designer)" title="Gurdeep Osahan (Web Designer)"  src="http://placehold.it/50/55C1E7/fff&amp;text=U" class="md-user-image">
                                    </a>
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p> @{{sms.messege}}
                                            <span class="chat_message_time">@{{sms.created_at}}</span>
                                        </p>
                                        
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>            
                    <?php }else{ echo "<h1>Please Log in First </h1>"; } ?>


                        </div>
                    </div>
<div class="chat_submit_box">
    <div class="uk-input-group">
        <div class="gurdeep-chat-box">
        <span style="vertical-align: sub;" class="uk-input-group-addon">
        <a href="#"><i class="fa fa-smile-o"></i></a>
        </span>
        <input type="text" placeholder="Type a message" id="submit_message" name="submit_message" class="md-input" v-model="sendSms" @keydown="inputHandler">
        </div>
    
    <span class="uk-input-group-addon">
    <a href="#"><i class="glyphicon glyphicon-send"></i></a>
    </span>
    </div>
</div>
</aside>
</div>



@section('messegeJs')
<script src="{{asset('bower_components/vue/dist/vue.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.17.0/axios.min.js"></script>

<script type="text/javascript">
$(function(){
$("#addClass").click(function () {
  $('#sidebar_secondary').addClass('popup-box-on');
    });
  
    $("#removeClass").click(function () {
  $('#sidebar_secondary').removeClass('popup-box-on');
    });
})
</script>

<script type="text/javascript">
const app = new Vue({
    el:'#app',

    data: {
        messeges:[],
        sendSms:'',
        userId:'1',
    },

    mounted:function(){
        this.getCusSms();
    },

    methods:{

    getCusSms:function(){
        axios.get('http://localhost/herons/getCusSms/')
        .then(function(response){
        app.messeges = response.data;
        });
    },

    inputHandler(e){
        if(e.keyCode===13 && !e.shiftKey){
          e.preventDefault();
          this.sendUserMessege();
        }
    },

    sendUserMessege:function(){
    if(this.sendSms && this.userId){
      axios.post('{{asset('/sendUserMessege')}}', {uId: this.userId,sms: this.sendSms })
            .then(function (response) {
              console.log(response.data); // show if success

              if(response.status===200){
                app.messeges = response.data;
                app.sendSms = '';
              }
            })
            .catch(function (error) {
              console.log(error); // run if we have error
            });
        }
    },


}


});    
</script>

@endsection
