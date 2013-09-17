@extends('master')

@section('title')
Items
@endsection

@section('content')
<div class="row">
    <h1 class="left">Items</h1>

    <a href="item/create" class="createButton right addBtn"><i class="foundicon-plus"></i> Create Item</a>

    <table class="pjTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Weight</th>
                <th>Calories</th>
                <th>Protein</th>
                <th>Carbohydrates</th>
                <th>Fat</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($items as $item)
            <tr>
                <td>
                    <a href="#" class="delBtn" data-item-id="{{ $item->id }}"><i class="foundicon-remove"></i></a>
                    <a href="item/view/{{ $item->id}}">{{ $item->name }}</a>
                </td>
                <td>{{ $item->weight }}</td>
                <td>{{ $item->calories }}</td>
                <td>{{ $item->protein }}</td>
                <td>{{ $item->carbohydrates }}</td>
                <td>{{ $item->fat }}</td>
            </tr>
        @endforeach
        @if (count($items) === 0)
        <tr>
            <td colspan="2">No items created yet - <a href="/item/create">Create One</a>?</td>
        </tr>
        @endif
        </tbody>
    </table>

    <div class="clearfix"></div>

    {{ $items->links() }}
</div>

<div id="deleteModal" class="reveal-modal tiny" >
    <h2>Are you sure?</h2>
    <p class="lead"></p>
    <p>Do you really want to delete this item...</p>
    <p>
        <a href="#" class="button alert radius" id="deleteButton" data-item-id="">Yes Delete It!</a>
        <a href="" class="secondary button radius">Cancel</a>
    </p>
    <a class="close-reveal-modal">&#215;</a>
</div>

<script type="text/javascript">
    $(".delBtn").click(function() {
        $('#deleteModal').foundation('reveal', 'open');
        var deleteID = $(this).attr('data-item-id');
        $('#deleteButton').attr('data-item-id', deleteID);
    });

    $("#deleteButton").click(function() {
        var deleteID = $(this).attr('data-item-id');
        var url = '{{ URL::to('/'); }}/item/delete/' + deleteID;
        document.location.href = url;
    });
</script>
@endsection
