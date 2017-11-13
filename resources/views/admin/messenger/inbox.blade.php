@extends('admin.master')

@section('title')
Admin Inbox
@endsection

@section('pcss')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
@import url("http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
.chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}

.chat li.left .chat-body
{
    margin-left: 60px;
}

.chat li.right .chat-body
{
    margin-right: 60px;
}


.chat li .chat-body p
{
    margin: 0;
    color: #777777;
}

.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px;
}

.body-panel
{
    overflow-y: scroll;
    height: 400px;
}

::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}
</style>
@endsection

@section('content')

<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-settings font-red-sunglo"></i>
            <span class="caption-subject bold uppercase">ADD CATEGORIE</span>
        </div>
    </div>

    @if(Session::get('message'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ Session::get('message') }}</strong>
    </div>
    @endif


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container" id="app">
	<div class="row">
     <div class="col-sm-4">
      <div class="panel panel-primary">
  <div class="panel-heading">
    <span class="glyphicon glyphicon-comment"></span> Comments
    <div class="btn-group pull-right">
        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
            <span class="glyphicon glyphicon-chevron-down"></span>
        </button>
    </div>
</div>

    <ul class="list-group">
      <li class="list-group-item" v-for="user in users" ><a href="#" @click="messege(user.id)" class="list-group-item">
      <strong>@{{user.fname}} @{{user.lname}}<span class="badge">12</span></strong><p>Showing Massege Here </p>
      </a>
      <input type="hidden" class="form-control"  v-model="userId" value="@{{ user.id }}">
    </li>
    </ul>

</div>
</div>
                 
                 
                 
                 <div class="col-sm-8">
                  <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-comment"></span> Comments
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </button>
                    </div>
                </div>
                <div class="panel-body body-panel">
                    <ul class="chat">


                    <div v-for="sms in messeges">

                      <div v-if="sms.from_id == <?php echo Session::get('cusId'); ?>">
                        <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&amp;text=ME" alt="User Avatar" class="img-circle">
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>@{{sms.created_at}}</small>  
                                </div>
                                <p class="pull-right">
                                     @{{sms.messege}}
                                </p>
                            </div>
                        </li>
                      </div>  

                      <div v-else> 
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&amp;text=U" alt="User Avatar" class="img-circle">
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span>@{{sms.created_at}}</small>
                                </div>
                                <p>
                                    @{{sms.messege}}
                                </p>
                            </div>
                        </li>
                      </div>
                      

                    </div>  



                        
                    </ul>
                </div>
                <div class="panel-footer clearfix">
                    <input type="text" class="form-control" rows="12" v-model="sendSms" @keydown="inputHandler">
                </div>
            </div>
    		</div>

                 </div>
             </div>
</div>    




</div>     
@endsection

@section('pjs')
<script src="{{asset('bower_components/vue/dist/vue.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.17.0/axios.min.js"></script>


<script type="text/javascript">
const app = new Vue({
  el: '#app',

data: {
  users:[],
  messeges:[],
  sendSms:'',
  userId:'',
  cusName:'',
},

mounted:function(){
  this.getUser();
}, 

methods: {
  getUser:function(){
    axios.get('{{asset('/chattingUser')}}')
    .then(function(response){
      app.users = response.data;      
    });
  },

  messege:function(id){ 
    app.userId = id;
    axios.get('http://localhost/herons/getMessege/'+id)
    .then(function(response){
     app.messeges = response.data;
    });
  },

  inputHandler(e){
    if(e.keyCode===13 && !e.shiftKey){
      e.preventDefault();
      this.sendMessege();
    }
  },

  sendMessege:function(){ 
    if(this.sendSms && this.userId){
      axios.post('{{asset('/sendMessege')}}', {
              uId: this.userId,
              sms: this.sendSms
            })
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


},


});

</script>

@endsection