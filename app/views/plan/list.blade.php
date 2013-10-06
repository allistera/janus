@extends('master')

@section('title') Plans @endsection

@section('content')
<div class="row">
    <h1>Your Plans</h1>

    <table class="pjTable">
        <thead>
            <tr>
                <th width="200">Date Generated</th>
                <th>Total Calories</th>
                <th>Total Protein</th>
                <th>Total Carbohydrates</th>
                <th>Total Fat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($plans as $plan)
            <tr>
                <td>{{ $plan->created_at }}</td>
                <td>{{ $plan->calories }}</td>
                <td>{{ $plan->protein }}</td>
                <td>{{ $plan->carbohydrates }}</td>
                <td>{{ $plan->fat }}</td>
                <td width="250">
                    <a href="plan/view/{{ $plan->id }}" style="color:#2ecc71">View</a> /
                    <a href="plan/export/{{ $plan->id }}" target="_blank" style="color:#3498db">Generate PDF</a> /
                    <a href="#" id="deleteBox" style="color:#e74c3c" data-plan-id="{{ $plan->id }}">Delete</a>
                </td>
            </tr>
        @endforeach
        @if (count($plans) === 0)
        <tr>
            <td colspan="2">No plans created yet - <a href="/plan/create">Create One</a>?</td>
        </tr>
        @endif
        </tbody>
    </table>

</div>

<div id="deleteModal" class="reveal-modal tiny" >
    <h2>Are you sure?</h2>
    <p class="lead"></p>
    <p>Do you really want to delete this plan...</p>
    <p>
        <a href="#" class="button alert radius" id="deleteButton" data-plan-id="">Yes Delete It!</a>
        <a href="" class="secondary button radius">Cancel</a></p>
    <a class="close-reveal-modal">&#215;</a>
</div>

<script type="text/javascript">
    $("#deleteBox").click(function() {
        $('#deleteModal').foundation('reveal', 'open');
        var deleteID = $(this).attr('data-plan-id');
        $('#deleteButton').attr('data-plan-id', deleteID);
    });

    $("#deleteButton").click(function() {
        var deleteID = $(this).attr('data-plan-id');
        var url = '{{ URL::to('/'); }}/plan/delete/' + deleteID;
        document.location.href = url;
    });
</script>
@endsection
