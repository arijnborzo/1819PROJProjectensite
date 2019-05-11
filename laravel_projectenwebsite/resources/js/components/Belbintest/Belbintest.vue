<template>
    <div>
      <b-container>
      
      <b-row align-h="center" class="mt-5">
        <h3>De Belbin test</h3>
        <p>Je ziet hieronder een aantal stellingen die iets zeggen over jouw rol in een team. Geef per stelling aan in hoeverre deze voor jou kenmerkend is.</p>

        <b-col cols="12">
          <b-card class="p-2">
            <strong><p>Ik houd van ...</p></strong>
            <!-- COMPETITE -->
            <b-form-group
                label="competitie"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <!-- O & B -->
            <b-form-group
                label="onderzoeken en begrijpen"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <!-- UITDAGING -->
            <b-form-group
                label="uitdaging"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

              <!-- AVONTUUR -->
            <b-form-group
                label="avontuur"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="	veel (verschillende) contacten"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="	zeer hoge kwaliteit"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>
            <b-form-group
                label="	alle neuzen de zelfde kant op	"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="	een coördinerende rol"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="het doorgronden van ideeën"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="zorgvuldigheid"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="verzinnen en vernieuwen"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="bovengemiddelde intellectuele uitdaging"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="niet praten maar poetsen"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="gezelligheid en voel me er verantwoordelijk voor"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="zekerheid"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="vernieuwing"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="evenwicht en harmonie"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="besluitvaardigheid"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="oorspronkelijkheid"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="spanning"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="gezamenlijkheid en verbondenheid"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="weloverwogen analyses"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="hard werken"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="ordelijkheid"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group><br>

            <strong><p>Ik ben ...</p></strong>
               <b-form-group
                label="gedreven"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <!-- O & B -->
            <b-form-group
                label="stellig"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <!-- UITDAGING -->
            <b-form-group
                label="behulpzaam"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

              <!-- AVONTUUR -->
            <b-form-group
                label="niet goed in delegeren"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="een bedachtzame na-denker en door-denker"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="tobberig"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>
            <b-form-group
                label="consciëntieus"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="iemand die ontzettend veel dingen leuk vindt"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="enthousiast"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="doelgericht"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="nauwkeurig"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="vol vertrouwen"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="systematisch"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="conflictmijdend"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="goed in het objectief en kritisch kijken naar de inbreng van anderen"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="solistisch"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="goed in het tot stand brengen van gezamenlijke besluiten"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="iemand die in een team consensus zoekt"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="makkelijk in contacten leggen"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="goed in delegeren"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="beschouwend"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="introvert"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="goed in het bedenken van oplossingen buiten de kaders"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>

            <b-form-group
                label="praktisch"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group><br>
            <strong><p>Tot slot een aantal uitspraken. Geef per zin aan in hoeverre dit van jou een typische uitspraak zou zijn in een team</p></strong>
            <b-form-group
                label="Ik heb de voors en tegens op een rijtje gezet"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                selected="radio"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>
            <b-form-group
                label="Als ik het zo beluister dan zijn we het hierover eens"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>


          <b-form-group
                label="Beter goed gejat dan slecht bedacht	"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                selected="radio"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>  
            <b-form-group
                label="Je kan niet voorzichtig genoeg zijn"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>
            <b-form-group
                label="Het is nodig steeds te blijven nadenken over vernieuwing en innovatie"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>
            <b-form-group
                label="Ik weet nog wel iemand die..."
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>
            <b-form-group
                label="Laten we het wel gezellig houden"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>
            <b-form-group
                label="Hebben we echt over alle mogelijkheden nagedacht?"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>
            <b-form-group
                label="Ik zeg tenminste waar het op staat"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>
            <b-form-group
                label="Ik heb jou nog niet gehoord, wat vind jij?"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>
            <b-form-group
                label="Laten we aan de slag gaan"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>
            <b-form-group
                label="We kunnen wel blijven praten, maar laten we wat doen"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>
            <b-form-group
                label="Het komt de kwaliteit ten goede als we er nog een keer naar kijken"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>
            <b-form-group
                label="Ik vind het belangrijk dat iedereen zich prettig voelt in dit team"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>
            <b-form-group
                label="Ik moet en zal het halen"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>
            <b-form-group
                label="Ik heb nog wel een andere oplossingsrichting"
                label-cols="4"
                label-align-lg="left" class="mb-2"
            >
              <b-form-radio-group
                v-model="selected1"
                :options="options"
                buttons
                size= "sm"
                button-variant="outline-primary"
                name="radio-btn-outline"
              ></b-form-radio-group>
            </b-form-group>
           



          </b-card>
        </b-col>
      </b-row>
      </b-container>
    </div>
</template>

<script>
export default {
  data() {
    return {
      selected: "radio1",
      options: [
        { text: "Niet kenmerkend", value: "0" },
        { text: "Enigszins kenmerkend", value: "1" },
        { text: "Heel kenmerkend", value: "2" }
      ]
    };
  }
};
</script>

<style>
</style>