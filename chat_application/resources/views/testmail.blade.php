<div class="form">
    	{{ Form::open(['action' => ['PhpmailController@SendEmail'],'method'=>'POST']) }}
                            @csrf
   
      	
      		<input type="text" name="subject" placeholder="Subject" required/>
              <input type="text" name="email" placeholder="email" required/>
		    <textarea name="message" placeholder="Message" required></textarea>
		    <button>Send Email</button>
    	</form>
  	</div>