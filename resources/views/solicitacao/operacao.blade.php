<div class="card shadow-lg p-3 bg-white" style="border-radius: 10px">
    <div class="row">
        <div class="col-md-12">
            <h1 class="borda-bottom text-center titulo">Solicitação - Operação</h1>
        </div>
    </div>

    <form method="POST" action="{{route('solicitacao.operacao.criar')}}">
        @csrf
        <input type="hidden" name="solicitacao_id" value="{{$solicitacao->id}}">
        <input type="hidden" name="operacao_flag" @if($operacao != null) value="1" @else value="2" @endif>
        <div class="row">
            <h3 class="subtitulo">Informações</h3>

            <div class="col-sm-6 mt-2">
                <label for="cirurgia">Cirurgia:</label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="cirurgia" id="cirurgia_sim" value="sim" checked>
                        <label class="form-check-label" for="cirurgia">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="cirurgia" id="cirurgia_nao" value="false">
                        <label class="form-check-label" for="cirurgia">
                            Não
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="pos_operatorio">

            <h3 id="" class="subtitulo">Pós-Operatório</h3>

            <div class="col-sm-4 mt-2">
                <label for="observacao_recuperacao">Observação da recuperação:</label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="observacao_recuperacao" id="observacao_recuperacao" value="true" @if($operacao != null && $operacao->observacao_recuperacao) checked @endif>
                        <label class="form-check-label" for="observacao_recuperacao">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="observacao_recuperacao" id="observacao_recuperacao" value="false" @if($operacao == null || ($operacao != null && !($operacao->observacao_recuperacao))) checked @endif>
                        <label class="form-check-label" for="observacao_recuperacao">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mt-2">
                <label for="analgesia_recuperacao">Uso de analgesia:</label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="analgesia_recuperacao" id="analgesia_recuperacao" value="true" @if($operacao != null && $operacao->analgesia_recuperacao) checked @endif>
                        <label class="form-check-label" for="analgesia_recuperacao">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="analgesia_recuperacao" id="analgesia_recuperacao" value="false" @if($operacao == null || ($operacao != null || !($operacao->analgesia_recuperacao))) checked @endif>
                        <label class="form-check-label" for="analgesia_recuperacao">
                            Não
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mt-2">
                <label for="outros_cuidados_recuperacao">Outros cuidados pós-operatórios:</label>
                <div class="row ml-1">
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="outros_cuidados_recuperacao" id="outros_cuidados_recuperacao" value="true" @if($operacao != null && $operacao->outros_cuidados_recuperacao) checked @endif>
                        <label class="form-check-label" for="outros_cuidados_recuperacao">Sim</label>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-check-input" type="radio" name="outros_cuidados_recuperacao" id="outros_cuidados_recuperacao" value="false" @if($operacao == null || ($operacao != null || !($operacao->outros_cuidados_recuperacao))) checked @endif>
                        <label class="form-check-label" for="outros_cuidados_recuperacao">
                            Não
                        </label>
                    </div>
                </div>
            </div>


        </div>

        @include('component.botoes_form')
    </form>
</div>

<script>
    $(document).ready(function(){

        if($("#operacao_flag").val() == 1){
            $("#eutanasia_sim").attr( 'checked', true );
            $("#eutanasia_dados").show().find('input, textarea').prop('disabled', false);
        }else{
            $("#eutanasia_nao").attr( 'checked', true );
            $("#eutanasia_dados").hide().find('input, textarea').prop('disabled', true);
        }

        $("#cirurgia_sim").click(function () {
            $("#pos_operatorio").show().find('input, radio').prop('disabled', false);
        });

        $("#cirurgia_nao").click(function () {
            $("#pos_operatorio").hide().find('input, radio').prop('disabled', true);
        });
    });
</script>

