<option value="">-- Select Local Govt Area --</option>
@foreach($locals as $local)
    <option value="{{ $local->id }}">{{ $local->local_name }}</option>
@endforeach
