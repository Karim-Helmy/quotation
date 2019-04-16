@extends('layouts.admin.main')
@section('content')
<div class="col-12 text-right">
    <a href="{{ route('key.create') }}" class="btn btn-primary">
        Create New Key
    </a>
</div>
    <div class="col-12 text-left">
        <div id="keys">
            @foreach ($labels as $label)
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="th-dark">
                    <th colspan="3" class="text-center">
                        {{ ucfirst($label->key) }}
                    </th>
                </thead>
                <tbody>
                        <tr>
                           <tr>
                               <td>
                                   Language
                               </td>
                               <td>
                                   Value
                               </td>
                               <td>
                                   Edit
                               </td>
                           </tr>
                           @foreach ($label->values as $singleValue)

                               <tr>
                                   <td>
                                       {{ ucfirst($singleValue->language->language) }}
                                   </td>
                                    <td>
                                        {{ ucfirst($singleValue->value) }}
                                    </td>
                                    <td>
                                        <a  href="{{ route('values.edit', $singleValue->id) }}"
                                            class="btn btn-primary btn-sm">
                                            Edit
                                        </a>
                                    </td>
                               </tr>
                           @endforeach
                        </tr>
                    </tbody>
                </table>
                @endforeach
        </div>
    </div>
@endsection
