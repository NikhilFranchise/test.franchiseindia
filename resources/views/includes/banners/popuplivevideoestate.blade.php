<style type="text/css">
    #myModal .modal-body { padding: 0 !important; }
    #myModal .modal-dialog { width: 600px !important; }
    #myModal .close { right: -19px !important; top: -19px !important; box-shadow: 0 0 15px 8px rgba(0, 0, 0, 0.35) !important; }
    #myModal .modal-content { margin-top: 70px; }
    #myModal .modal-content { background-color: #000 !important; }
</style>

<div id="myModal" class="modal fade" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-body" id="yt-player">
                <iframe id="videoModalone" width="100%" height="400" src="https://www.youtube.com/embed/aTZuVEYaMZE" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>


<script language="javascript" type="text/javascript">
    $(document).ready(function () {
        let mymodal = $("#myModal");
        mymodal.on('hidden.bs.modal', function () {
            $('#videoModalone').remove();
        });
        $('.close').click(function () { $('#videoModalone').remove();  });
        if (screen.width > 767) { mymodal.modal('show'); }
    });
</script>



