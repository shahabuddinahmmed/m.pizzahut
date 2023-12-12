
@if(isset($feedback->customer_name) && $feedback->customer_name!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">Customer Name*</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px; height:auto;">
            {{$feedback->customer_name}}
        </div>
    </div>
@endif

@if(isset($feedback->gender) && $feedback->gender!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">Gender:</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            {{$feedback->gender}}
        </div>
    </div>
@endif

@if(isset($feedback->email) && $feedback->email!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">E-mail*</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            {{$feedback->email}}
        </div>
    </div>
@endif

@if(isset($feedback->mobile_no) && $feedback->mobile_no!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">Mobile No.*</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            {{$feedback->mobile_no}}
        </div>
    </div>
@endif

@if(isset($feedback->contact_time) && $feedback->contact_time!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">Preferred time for contact</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            {{$feedback->contact_time}}
        </div>
    </div>
@endif

@if(isset($feedback->address) && $feedback->address!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">Address:</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            {{$feedback->address}}
        </div>
    </div>
@endif

@if(isset($feedback->restaurant_address) && $feedback->restaurant_address!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">Location of the Pizza Hut*</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            {{$feedback->restaurant_address}}
        </div>
    </div>
@endif

@if(isset($feedback->city) && $feedback->city!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">City:</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            {{$feedback->city}}
        </div>
    </div>
@endif

@if(isset($feedback->date_of_visit) && $feedback->date_of_visit!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">Date of visit:</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            {{$feedback->date_of_visit}}
        </div>
    </div>
@endif

@if(isset($feedback->time_of_visit) && $feedback->time_of_visit!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">Time of visit:</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            {{$feedback->time_of_visit}}
        </div>
    </div>
@endif

@if(isset($feedback->feedback) && $feedback->feedback!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">Your Feedback* :</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            {{$feedback->feedback}}
        </div>
    </div>
@endif

@if(isset($feedback->how_often_u_visit) && $feedback->how_often_u_visit!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">How Often Visit:</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            {{$feedback->how_often_u_visit}}
        </div>
    </div>
@endif

@if(isset($feedback->restaurant_clean) && $feedback->restaurant_clean!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">Was the restaurant clean?</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            {{$feedback->restaurant_clean}}
        </div>
    </div>
@endif

@if(isset($feedback->service_hospitable) && $feedback->service_hospitable!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">Was the service hospitable and friendly?</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            {{$feedback->service_hospitable}}
        </div>
    </div>
@endif

@if(isset($feedback->receive_ordered) && $feedback->receive_ordered!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">Did you receive what you ordered?</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            {{$feedback->receive_ordered}}
        </div>
    </div>
@endif

@if(isset($feedback->restaurant_maintained) && $feedback->restaurant_maintained!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">Restuarant Maintain:</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            {{$feedback->restaurant_maintained}}
        </div>
    </div>
@endif

@if(isset($feedback->food_liking) && $feedback->food_liking!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">Was the food to your liking?</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            {{$feedback->food_liking}}
        </div>
    </div>
@endif

@if(isset($feedback->served_speedily) && $feedback->served_speedily!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">Were you served speedily?</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            {{$feedback->served_speedily}}
        </div>
    </div>
@endif

@if(isset($feedback->value_for_money) && $feedback->value_for_money!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">Value Money:</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            {{$feedback->value_for_money}}
        </div>
    </div>
@endif

@if(isset($feedback->visit_again) && $feedback->visit_again!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">Visit Again:</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            {{$feedback->visit_again}}
        </div>
    </div>
@endif
@if(isset($feedback->receive_promise_time) && $feedback->receive_promise_time!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">Did you receive the delivery within promise time:</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            {{$feedback->receive_promise_time}}
        </div>
    </div>
@endif
@if(isset($feedback->food_hot) && $feedback->food_hot!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">Did you receive your food Hot:</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            {{$feedback->food_hot}}
        </div>
    </div>
@endif
@if(isset($feedback->hospitable) && $feedback->hospitable!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">Was the service hospitable and friendly:</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            {{$feedback->hospitable}}
        </div>
    </div>
@endif
@if(isset($feedback->image1) && $feedback->image1!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">Upload Pictures 1:</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            <a href="{{url($feedback->image1)}}">Picture 1</a>
        </div>
    </div>
@endif
@if(isset($feedback->image2) && $feedback->image2!=null)
    <div class="row">
        <div class="col-md-6 mb-3" style="background-color: #d6e6ff; width:40%; height:auto; padding:15px 15px;">
            <label class="col-form-label" for="email">Upload Pictures 2:</label>
        </div>
        <div class="col-md-6 mb-3" style="padding:15px 25px;; height:auto;">
            <a href="{{url($feedback->image2)}}">Picture 2</a>
        </div>
    </div>
@endif