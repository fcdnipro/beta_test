<div class="site-index">

    <?php //объявление datepicker
    /* @var $this yii\web\View */
    use kartik\date\DatePicker;
    use kartik\spinner\spinner;
    use app\models\Currency;
    $this->title = 'My Yii Application';
    echo 'FIll Date';
    echo '<label class="control-label"></label>';
    echo DatePicker::widget([
        'name' => 'from_date',
        'type' => DatePicker::TYPE_RANGE,
        'name2' => 'to_date',
        'id' => $idRange,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'endDate' => "0d",
        ]
    ]);
    ?>

    <?php
    echo '<button id="send" class="btn btn-primary btn-sm">Fill DB by URL';
    echo Spinner::widget([
        'preset' => 'tiny',
        'align' => 'left',
        'caption' => 'Loading &hellip;',
        'hidden' => true,
    ]);
    echo '</button>';
    ?>

    <div class="msg-error" id="error-msg">
    </div>
    <div class="msg-success" id="success-msg">
    </div>
</div>

<script type="text/javascript">
     function addMsg(type, message)
     {
         if (type == 'error')
         {
             $('#error-msg').addClass('alert alert-danger');
             $('#error-msg').html(message);
         }
         if (type == "success")
         {
             $('#success-msg').addClass('alert alert-success');
             $('#success-msg').html(message);
         }
     }

     function clearMsg()
     {
         $('#error-msg').removeClass('alert alert-danger');
         $('#error-msg').html('');
         $('#success-msg').removeClass('alert alert-success');
         $('#success-msg').html('');
     }
    $(document).ready(function()
    {
        $('#send').click(function()
        {
            let sDate = $('#<?=$idRange?>').val();
            let eDate = $('#<?=$idRange?>-2').val();

            if (sDate == '' || sDate == undefined || eDate == '' || eDate == undefined)
            {
                addMsg('error', 'Date range field are empty.');
                return;
            }

            clearMsg();

            $.ajax({
                url: '/fill-db-range',
                type: 'post',
                data : {
                    sDate : sDate,
                    eDate : eDate
                },
                dataType: 'json',
                success: function(data)
                {
                    let filledList = data.filledList;
                    let existList = data.existList;
                    let NoDataList = data.NoDataList;

                    let errorHtml = '';
                    let successHtml = '';

                    if (filledList.length>0)
                    {
                        for ( let i = 0; i<filledList.length;i++)
                        {
                            successHtml +='Data for date'+filledList.[i]+'filled in DB';
                        }
                        addMsg('alert-success',successHtml)
                    }

                    if (filledList.length>0)
                    {
                        for ( let i = 0; i<filledList.length;i++)
                        {
                            successHtml +='Data for date'+filledList.[i]+'filled in DB';
                        }
                        addMsg('alert-success',successHtml)
                    }

                    if (filledList.length>0)
                    {
                        for ( let i = 0; i<filledList.length;i++)
                        {
                            successHtml +='Data for date'+filledList.[i]+'filled in DB';
                        }
                        addMsg('alert-success',successHtml)
                    }
                }
            });

        });
    });


</script>
