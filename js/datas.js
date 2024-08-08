function toggleInfo(buttonId) {
    const info = document.querySelector(`#${buttonId} .info`);
    if (info.classList.contains('show')) {
        info.classList.remove('show');
    } else {
        info.classList.add('show');
    }
}

var eventosPlanejados = [
    [ "Segunda", "29/09", // Dia da Semana e Data
        [ // Informações do Evento abaixo:
            "Nome Teste",
            "Local do Evento",
            "12:10",
            "Descrição do evento pode ser longa.",
        ],
    ],

    [ "Terça", "30/09", // Dia da Semana e Data
        [ // Informações do Evento abaixo:
            
        ],
    ],

    [ "Quarta", "31/09", // Dia da Semana e Data
        [ // Informações do Evento abaixo:
        ],
    ],

    [ "Quinta", "01/10", // Dia da Semana e Data
        [ // Informações do Evento abaixo:
            "nome pessoa test",
            "Local evento test",
            "66:66",
            "Descrição",
        ],
        [ // Informações do Evento abaixo:
            "Marcelo",
        ],
        [ // Informações do Evento abaixo:
            "José Carlos",
            null,
            "10:55",
            null,
        ],
    ],

    [ "Sexta", "01/10", // Dia da Semana e Data
        [ // Informações do Evento abaixo:
        ],
    ],
];
document.addEventListener("DOMContentLoaded", () => {
    for (let i = 0; i < eventosPlanejados.length; i++) {
        if (eventosPlanejados[i][2] != null
        && eventosPlanejados[i][2].length > 0){
            var diaSemana = `
            <button id="${eventosPlanejados[i][0]}" class="ButtonBox eventPlanned" onclick="toggleInfo(id)">
                <span id="${eventosPlanejados[i][0]}Text">${eventosPlanejados[i][0]}-Feira (${eventosPlanejados[i][1]})</span>
                <div id="${eventosPlanejados[i][0]}Info" class="info">
                </div>
            </button>
            `;
            document.getElementById("RedBox").insertAdjacentHTML('beforeend', diaSemana);

            for (let i2 = 0; i2 < eventosPlanejados[i].length; i2++) {
                if (Array.isArray(eventosPlanejados[i][i2])){
                    for (let i3 = 0; i3 < 4; i3++) {
                        if (eventosPlanejados[i][i2][i3] == null){
                            eventosPlanejados[i][i2][i3] = "Nada";
                        }
                    }
                    var eventoDescrito = `
                    <div id="inside1">
                        <div class="box">
                            <div class="info-item">
                                <img src="css/media/feliz.png" id="IconI">
                                <span>${eventosPlanejados[i][i2][0]}</span>
                            </div>
                            <div class="info-item">
                                <img src="css/media/local.png" id="IconI">
                                <span>${eventosPlanejados[i][i2][1]}</span>
                            </div>
                            <div class="info-item">
                                <img src="css/media/relogio.png" id="IconI">
                                <span>${eventosPlanejados[i][i2][2]}</span>
                            </div>
                            <div class="info-item">
                                <img src="css/media/tema.png" id="IconI">
                                <h3>${eventosPlanejados[i][i2][3]}</h3>
                            </div>
                        </div>
                    </div>
                    `;
                    document.getElementById(eventosPlanejados[i][0]+"Info").insertAdjacentHTML('beforeend', eventoDescrito);
                }
            }
        }
    }
})