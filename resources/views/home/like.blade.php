@can('like', $model)
    <form action="{{ route('userpanel.like') }}" method="POST">
        @csrf
        <input  type="hidden" name="likeable_type" value="{{ get_class($model) }}"/>
        <input  type="hidden" name="id" value="{{ $model->id }}"/>
        <button  class="post-meta-like mx-4">
            <i class="bi bi-heart-beat"></i>
            like
        </button>
    </form>
@endcan

@can('unlike', $model)
    <form action="{{ route('userpanel.unlike') }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="likeable_type" value="{{ get_class($model) }}"/>
        <input type="hidden" name="id" value="{{ $model->id }}"/>
        <button class="post-meta-like mx-4">
            <i class="bi bi-heart-beat"></i>
            unlike
        </button>
        <button></button>
    </form>
@endcan
