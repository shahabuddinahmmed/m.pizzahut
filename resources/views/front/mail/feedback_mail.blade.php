
<html>
<head>
    <title>Feedback Email</title>
</head>

<body>
<p>Here is feedback from {{  $data['customer_name'] }} and order no#{{ $data['order_id'] }}</p>
<p> Have you received the food on due time?</p>
@if($data['is_due']==1)
<p style="color:green">Yes</p>
    @else
    <p style="color:red">No</p>
@endif
<p>Was the food hot?</p>
@if($data['is_hot']==1)
    <p style="color:green">Yes</p>
@else
    <p style="color:red">No</p>
@endif

@if(isset($data['comment']) && $data['comment']!=null)
    <h2>Comment</h2>
    <p>{{ $data['comment'] }}</p>
    @endif
</body>

</html>
