import LoginForm from "./components/Login/Login";
import Home from "./components/Overzicht/Overzicht";
import Studenten from "./components/Studenten/Studenten";
import Archief from "./components/Archief/Archief";
import Belbintest from "./components/Belbintest/Belbintest";
import NieuwProject from "./components/NieuwProject/NieuwProject";
import MijnProject from "./components/MijnProject/MijnProject";
import DetailProject from "./components/MijnProject/DetailProject";
import Registreer from "./components/Registreer/Registreren";
import PaswoordVergeten from "./components/PaswoordVergeten/PaswoordVergeten";

export const routes = [
  { path: "", component: LoginForm },
  {
    path: "/home",
    component: Home
  },
  { path: "/login", component: LoginForm },
  {
    path: "/studenten",
    component: Studenten,
    props: {
      students: [
        ["Andreas Lauwers", "Plant", "Projectenwebsite", 1],
        ["Arno Lauwers", "Voorzitter", "Projectenwebsite", 1],
        ["Arijn Lauwers", null, "Projectenwebsite", 1],
        ["Lukas Lauwers", "Vormer", "Projectenwebsite", 1],
        ["Andreas Petit", "Groepswerker", "Macrokeyboard", 2],
        ["Lukas Petit", "Monitor", "Macrokeyboard", 2],
        ["Loser tje", "Monitor", null, null]
      ]
    }
  },
  {
    path: "/archief",
    component: Archief,
    props: {
      projects: [
        [
          ["Arno Stas", "Arno Stas", "Arno Stas", "Arno Stas"],
          [
            {
              id: 1,
              title: "Projectensite",
              status: "Accepted",
              short_description: "dit is de korte bschrrrrrrrrrrrr",
              full_description: "Dit is de laaaaaaaaaaaaaaaange beschrrrr",
              teacher_id: 6,
              creator_id: 1,
              main_question: "Dit is de hoofdvraag",
              side_questions:
                "het maken van ee degelijke site? Of wat moet je anderss doen?",
              created_at: "2019-05-24 07:52:45",
              updated_at: "2019-05-24 07:52:45"
            }
          ]
        ],
        [
          ["Arno Stas", "Arno Stas", "Arno Stas", "Arno Stas"],
          [
            {
              id: 2,
              title: "MAcro",
              status: "Accepted",
              short_description: "dit is de korte bschrrrrrrrrrrrr",
              full_description: "Dit is de laaaaaaaaaaaaaaaange beschrrrr",
              teacher_id: 5,
              creator_id: 2,
              main_question: "Dit is de hoofdvraag",
              side_questions:
                "het maken van ee degelijke site? Of wat moet je anderss doen?",
              created_at: "2018-05-24 07:52:45",
              updated_at: "2019-05-24 07:52:45"
            }
          ]
        ],
        [
          ["Arno Stas", "Arno Stas", "Arno Stas", "Arno Stas"],
          [
            {
              id: 3,
              title: "Eliboy",
              status: "Declined",
              short_description: "dit is de korte bschrrrrrrrrrrrr",
              full_description: "Dit is de laaaaaaaaaaaaaaaange beschrrrr",
              teacher_id: 6,
              creator_id: 2,
              main_question: "Dit is de hoofdvraag",
              side_questions:
                "het maken van ee degelijke site? Of wat moet je anderss doen?",
              created_at: "2017-05-24 07:52:45",
              updated_at: "2018-05-24 07:52:45"
            }
          ]
        ],
        [
          ["Arno Stas", "Arno Stas", "Arno Stas", "Arno Stas"],
          [
            {
              id: 4,
              title: "NBAAA",
              status: "In beraad",
              short_description: "dit is de korte bschrrrrrrrrrrrr",
              full_description: "Dit is de laaaaaaaaaaaaaaaange beschrrrr",
              teacher_id: 3,
              creator_id: 2,
              main_question: "Dit is de hoofdvraag",
              side_questions:
                "het maken van ee degelijke site? Of wat moet je anderss doen?",
              created_at: "2016-05-24 07:52:45",
              updated_at: "2019-05-24 07:52:45"
            }
          ]
        ]
      ]
    }
  },
  { path: "/belbintest", component: Belbintest },
  { path: "/nieuwproject", component: NieuwProject },
  {
    path: "/mijnproject",
    component: MijnProject,
    props: {
      titel: "Projectenwebsite",
      status: false,
      beschrijving:
        "Een platform voor projecten goed te keuren But why smiling man her imagine married. Chiefly can man her out believe manners cottage colonel unknown. Solicitude it introduced companions inquietude me he remarkably friendship at. My almost or horses period. Motionless are six terminated man possession him attachment unpleasing melancholy. Sir smile arose one share. No abroad in easily relied an whence lovers temper by. Looked wisdom common he an be giving length mr. ",
      hoofdvraag:
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisi ipsum, hendrerit eget feugiat vel, dignissim ac neque. Praesent egestas massa amet.?",
      nevenvragen: ["Waarom?", "Wie?", "Waar?", "Wanneer?"],
      smart: {
        specifiek:
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisi ipsum, hendrerit eget feugiat vel, dignissim ac neque.",
        meetbaar:
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisi ipsum, hendrerit eget feugiat vel, dignissim ac neque.",
        acceptabel: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        realistisch:
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisi ipsum, hendrerit eget feugiat vel, dignissim ac neque. Praesent egestas massa amet.",
        tijdsgebonden:
          "Lorem ipsum dolor sit amet, consectetur adipiscing elit. ."
      },
      groepsleden: {
        "Arno Stas": "implementor",
        "Andreas Lauwers": "coordinator",
        "Lukas Petit": "plant",
        "Arijn Borzo": "implementor"
      }
    }
  },
  {
    path: "/detailproject",
    component: DetailProject
  },
  { path: "/registreer", component: Registreer },
  { path: "/paswoordvergeten", component: PaswoordVergeten },
  { path: "/redirect", redirect: { name: "LoginForm" } },
  { path: "*", redirect: { path: "/" } }
];
