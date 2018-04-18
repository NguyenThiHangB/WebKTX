 <!-- button -->
{!! 
    Html::decode(Html::link('#', '<i class="fa fa-fw ' . $iconButton . '"></i>' . __('Delete'), ['class' => 'btn btn-' . $colorButton . '', 'data-toggle' => 'modal', 'data-target' => '#modal-' . $nameModal . '' . $record->id]))
!!}
<!-- Modal-->
<div class="modal" id="modal-{{ $nameModal }}{{ $record->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="modal-label">
                    {{ __('Xác nhận') }}
                </h4>
            </div>
            <div class="modal-body" style="font-size: 15px;">
                {!! __('Bạn muốn xóa bản ghi đã chọn. Bạn có chắc không?') !!}
            </div>
            @if (is_integer($record))
                @php $type = null; @endphp
            @endif
            <div class="modal-footer">
            {{ 
                Form::open(['method' => ($nameModal == 'delete') ? 'delete' : 'post', 'url' => !empty($type) ? (route($nameRoute, $record) . '?type=' . $type) : (route($nameRoute, $record))]) 
            }}
                <div class="col-md-6 text-right">    
                    <button type="button" class="btn btn-default" 
                    data-dismiss="modal">
                        {{ __('Đóng') }}
                    </button>
                </div>
                <div class="col-md-6 text-left">
                    {{ Form::submit(__('Ok'), ['class' => 'btn btn-primary']) }}
                </div>
            {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
<!--/ Modal-->
<!--/ button-->