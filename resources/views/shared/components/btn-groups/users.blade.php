@btn_group
    @table_btn([
        'title' => 'general.edit',
        'action' => $action . '/' . $user->id,
        'icon' => 'pencil-alt',
    ])
    @if($user->role !== 'Admin')
        @table_btn([
            'title' => 'general.delete',
            'action' => "javascript:del($user->id);",
            'icon' => 'times',
        ])
    @endif
@endbtn_group

@include('shared.components.forms.delete')