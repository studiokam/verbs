var app = new Vue({
    el: '#app',
    data: {
        verbsGroups: [
            // {number: 1, list: 'be, beat, become, begin, break, bring, build, burn, buy'},
            // {number: 2, list: 'catch, choose, come, cost, cut, do, dream, drink'},
            // {number: 3, list: 'drive, eat, fall, feel, find, fly, get, give, go'},
            {number: 4, list: 'grow, have, hear, hit, hold, hurt, keep, know, learn, leave'},
            {number: 5, list: 'lend, let, lose, make, meet, pay, put, read, ride'},
            {number: 6, list: 'ring, run, say, see, sell, send, set, show, shut, sing'},
            {number: 7, list: 'sit, sleep, smell, speak, stand, steal, swim, spend, swear'},
            {number: 8, list: 'take, teach, tear, tell, think, throw, wake, wear, win, write'},

            {number: 1, list: 'burst, dig, feed, forget, forgive, lie, light, must/have to'},
            {number: 2, list: 'can, draw, fight, hang, hide, lead, shine, sink, spill, understand'},
            {number: 3, list: 'bend, bite, blow, lay, overcome, shake, shoot, spell'},

            {number: 11, list: 'be, beat, break, buy, have, hear, hit, hold, come, do, drive, fall, ' +
                    'feel, fly, get, give, go, make, meet, ride, run, see, show'},

            {number: 9, list: 'be, beat, become, begin, break, bring, build, burn, buy, grow, ' +
                    'have, hear, hit, hold, hurt, keep, know, learn, leave, catch, ' +
                    'choose, come, cost, cut, do, dream, drink, drive, eat, fall, ' +
                    'feel, find, fly, get, give, go, lend, let, lose, make, meet, pay, ' +
                    'put, read, ride, ring, run, say, see, sell, send, set, show, shut, sing ' +
                    'sit, sleep, smell, speak, stand, steal, swim, spend, swear ' +
                    'take, teach, tear, tell, think, throw, wake, wear, win, write'},
        ],

        verbsList: [
            {inf: 'be', pastSimp: 'was/were', pastPrac: 'been', pl: 'być'},
            {inf: 'beat', pastSimp: 'beat', pastPrac: 'beaten', pl: 'bić'},
            {inf: 'become', pastSimp: 'became', pastPrac: 'become', pl: 'stawać się'},
            {inf: 'begin', pastSimp: 'began', pastPrac: 'begun', pl: 'zaczynać'},
            {inf: 'break', pastSimp: 'broke', pastPrac: 'broken', pl: 'łamać'},
            {inf: 'bring', pastSimp: 'brought', pastPrac: 'brought', pl: 'przynosić'},
            {inf: 'build', pastSimp: 'built', pastPrac: 'built', pl: 'budować'},
            {inf: 'burn', pastSimp: 'burnt', pastPrac: 'burnt', pl: 'spalić'},
            {inf: 'buy', pastSimp: 'bought', pastPrac: 'bought', pl: 'kupować'},


            {inf: 'catch', pastSimp: 'caught', pastPrac: 'caught', pl: 'chwytać, łapać'},
            {inf: 'choose', pastSimp: 'chose', pastPrac: 'chosen', pl: 'wybierać'},
            {inf: 'come', pastSimp: 'came', pastPrac: 'come', pl: 'przybywać'},
            {inf: 'cost', pastSimp: 'cost', pastPrac: 'cost', pl: 'kosztować'},
            {inf: 'cut', pastSimp: 'cut', pastPrac: 'cut', pl: 'ciąć'},
            {inf: 'do', pastSimp: 'did', pastPrac: 'done', pl: 'robić (do)'},
            {inf: 'dream', pastSimp: 'dreamt', pastPrac: 'dreamt', pl: 'śnić'},
            {inf: 'drink', pastSimp: 'drank', pastPrac: 'drunk', pl: 'pić'},

            {inf: 'drive', pastSimp: 'drove', pastPrac: 'driven', pl: 'kierować'},
            {inf: 'eat', pastSimp: 'ate', pastPrac: 'eaten', pl: 'jeść'},
            {inf: 'fall', pastSimp: 'fell', pastPrac: 'fallen', pl: 'upadać'},
            {inf: 'feel', pastSimp: 'felt', pastPrac: 'felt', pl: 'czuć'},
            {inf: 'find', pastSimp: 'found', pastPrac: 'found', pl: 'znajdować'},
            {inf: 'fly', pastSimp: 'flew', pastPrac: 'flown', pl: 'latać'},
            {inf: 'get', pastSimp: 'got', pastPrac: 'got', pl: 'dostawać'},
            {inf: 'give', pastSimp: 'gave', pastPrac: 'given', pl: 'dawać'},
            {inf: 'go', pastSimp: 'went', pastPrac: 'gone/been', pl: 'iść / jechać'},

            // nie
            //
            {inf: 'burst', pastSimp: 'burst', pastPrac: 'burst', pl: 'wybuchać, pękać'},
            {inf: 'dig', pastSimp: 'dug', pastPrac: 'dug', pl: 'wykopywać / kopać'},
            {inf: 'feed', pastSimp: 'fed', pastPrac: 'fed', pl: 'żywić / karmić'},
            {inf: 'forget', pastSimp: 'forgot', pastPrac: 'forgotten', pl: 'zapominać'},
            {inf: 'forgive', pastSimp: 'forgave', pastPrac: 'forgiven', pl: 'wybaczać'},
            // {inf: 'lie', pastSimp: 'lay', pastPrac: 'lain', pl: 'leżeć'},
            {inf: 'lie', pastSimp: 'lied', pastPrac: 'lied', pl: 'kłamać'},
            {inf: 'light', pastSimp: 'lit', pastPrac: 'lighted', pl: 'zapalać / podpalać'},
            {inf: 'must/have to', pastSimp: 'had to', pastPrac: 'had to', pl: 'musieć'},


            {inf: 'can', pastSimp: 'could', pastPrac: 'been able to', pl: 'umieć, móc, potrafić'},
            {inf: 'draw', pastSimp: 'drew', pastPrac: 'drawn', pl: 'narysować / naszkicować'},
            {inf: 'fight', pastSimp: 'fought', pastPrac: 'fought', pl: 'walczyć'},
            {inf: 'hang', pastSimp: 'hanged/hung', pastPrac: 'hanged/hung', pl: 'wieszać / się (kogoś / coś)'},
            {inf: 'hide', pastSimp: 'hid', pastPrac: 'hid', pl: 'ukrywać / się'},
            {inf: 'lead', pastSimp: 'led', pastPrac: 'led', pl: 'prowadzić'},
            {inf: 'mean', pastSimp: 'mean', pastPrac: 'meant', pl: 'znaczyć'},
            {inf: 'shine', pastSimp: 'shone', pastPrac: 'shone', pl: 'zaświecić (czymś)'},
            {inf: 'sink', pastSimp: 'sank', pastPrac: 'sunk', pl: 'tonąć'},
            {inf: 'spill', pastSimp: 'spilt', pastPrac: 'spilled', pl: 'rozlewać'},
            {inf: 'understand', pastSimp: 'understood', pastPrac: 'understood', pl: 'rozumieć'},


            {inf: 'bend', pastSimp: 'bent', pastPrac: 'bent', pl: 'zginać, nachylać'},
            {inf: 'bite', pastSimp: 'bit', pastPrac: 'bitten', pl: 'ugryźć'},
            {inf: 'blow', pastSimp: 'blew', pastPrac: 'blown', pl: 'wiać, dmuchać'},
            {inf: 'lay', pastSimp: 'laid', pastPrac: 'laid', pl: 'położyć, kłaść'},
            {inf: 'overcome', pastSimp: 'overcome', pastPrac: 'overcoming', pl: 'zwalczyć, przezwyciężyć, pokonać (przeszkodę, trudności)'},
            {inf: 'shake', pastSimp: 'shook', pastPrac: 'shaken', pl: 'trząść, potrząsać'},
            {inf: 'shoot', pastSimp: 'shot', pastPrac: 'shot', pl: 'strzelać'},
            {inf: 'spell', pastSimp: 'spelt/spelled', pastPrac: 'spelt/spelled', pl: 'literować'},
            // nie
            //



            {inf: 'grow', pastSimp: 'grew', pastPrac: 'grown', pl: 'rosnąć'},
            {inf: 'have', pastSimp: 'had', pastPrac: 'had', pl: 'mieć'},
            {inf: 'hear', pastSimp: 'heard', pastPrac: 'heard', pl: 'słyszeć'},
            {inf: 'hit', pastSimp: 'hit', pastPrac: 'hit', pl: 'uderzać'},
            {inf: 'hold', pastSimp: 'held', pastPrac: 'held', pl: 'trzymać (w rękach lub w ramionach)'},
            {inf: 'hurt', pastSimp: 'hurt', pastPrac: 'hurt', pl: 'ranić'},
            {inf: 'keep', pastSimp: 'kept', pastPrac: 'kept', pl: 'trzymać (mieć w posiadaniu, przechowywać)'},
            {inf: 'know', pastSimp: 'knew', pastPrac: 'known', pl: 'znać / wiedzieć'},
            {inf: 'learn', pastSimp: 'learnt', pastPrac: 'learnt', pl: 'uczyc / się'},
            {inf: 'leave', pastSimp: 'left', pastPrac: 'left', pl: 'opuszczać/wyjeżdżać'},


            {inf: 'lend', pastSimp: 'lent', pastPrac: 'lent', pl: 'pożyczać / komuś'},
            {inf: 'let', pastSimp: 'let', pastPrac: 'let', pl: 'pozwalać'},
            {inf: 'lose', pastSimp: 'lost', pastPrac: 'lost', pl: 'gubic/tracić'},
            {inf: 'make', pastSimp: 'made', pastPrac: 'made', pl: 'robić (ma..)'},
            {inf: 'meet', pastSimp: 'met', pastPrac: 'met', pl: 'spotykać'},
            {inf: 'pay', pastSimp: 'paid', pastPrac: 'paid', pl: 'płacić'},
            {inf: 'put', pastSimp: 'put', pastPrac: 'put', pl: 'kłaść'},
            {inf: 'read', pastSimp: 'read', pastPrac: 'read', pl: 'czytać'},
            {inf: 'ride', pastSimp: 'rode', pastPrac: 'ridden', pl: 'jeździć (na czymś)'},


            {inf: 'ring', pastSimp: 'rang', pastPrac: 'rung', pl: 'dzwonić'},
            {inf: 'run', pastSimp: 'ran', pastPrac: 'run', pl: 'biec'},
            {inf: 'say', pastSimp: 'said', pastPrac: 'said', pl: 'mówić'},
            {inf: 'see', pastSimp: 'saw', pastPrac: 'seen', pl: 'widzieć'},
            {inf: 'sell', pastSimp: 'sold', pastPrac: 'sold', pl: 'sprzedawać'},
            {inf: 'send', pastSimp: 'sent', pastPrac: 'sent', pl: 'wysyłać'},
            {inf: 'set', pastSimp: 'set', pastPrac: 'set', pl: 'umieszczać / postawić'},
            {inf: 'show', pastSimp: 'showed', pastPrac: 'shown', pl: 'pokazywać'},
            {inf: 'shut', pastSimp: 'shut', pastPrac: 'shut', pl: 'zamykać / zatrzaskiwać'},
            {inf: 'sing', pastSimp: 'sang', pastPrac: 'sung', pl: 'śpiewać'},


            {inf: 'sit', pastSimp: 'sat', pastPrac: 'sat', pl: 'siedzieć'},
            {inf: 'sleep', pastSimp: 'slept', pastPrac: 'slept', pl: 'spać'},
            {inf: 'smell', pastSimp: 'smelt', pastPrac: 'smelt', pl: 'wąchać / pachnieć'},
            {inf: 'speak', pastSimp: 'spoke', pastPrac: 'spoken', pl: 'mówić'},
            {inf: 'spend', pastSimp: 'spent', pastPrac: 'spent', pl: 'spędzać, wydawać'},
            {inf: 'stand', pastSimp: 'stood', pastPrac: 'stood', pl: 'stać'},
            {inf: 'steal', pastSimp: 'stole', pastPrac: 'stolen', pl: 'kraść'},
            {inf: 'swim', pastSimp: 'swam', pastPrac: 'swum', pl: 'pływać'},

            // dodatkowe
            //
            {inf: 'swear', pastSimp: 'swore', pastPrac: 'sworn', pl: 'przysięgać'},
            //
            // dodatkowe


            {inf: 'take', pastSimp: 'took', pastPrac: 'taken', pl: 'brać'},
            {inf: 'teach', pastSimp: 'taught', pastPrac: 'taught', pl: 'uczyć'},
            {inf: 'tear', pastSimp: 'torn', pastPrac: 'torn', pl: 'drzeć / rozrywać'},
            {inf: 'tell', pastSimp: 'told', pastPrac: 'told', pl: 'mówić'},
            {inf: 'think', pastSimp: 'thought', pastPrac: 'thought', pl: 'mysleć'},
            {inf: 'throw', pastSimp: 'threw', pastPrac: 'thrown', pl: 'wyrzucać'},
            {inf: 'wake', pastSimp: 'woke', pastPrac: 'woken', pl: 'budzić się'},
            {inf: 'wear', pastSimp: 'wore', pastPrac: 'wore', pl: 'być ubranym w coś'},
            {inf: 'win', pastSimp: 'won', pastPrac: 'won', pl: 'wygrywać'},
            {inf: 'write', pastSimp: 'wrote', pastPrac: 'written', pl: 'pisać'},

        ],
        // verbsList: [
        // {inf: 'be', pastSimp: 'was/were', pastPrac: 'been', pl: 'być'},
        // {inf: 'beat', pastSimp: 'beat', pastPrac: 'beaten', pl: 'bić'},
        // {inf: 'become', pastSimp: 'became', pastPrac: 'become', pl: 'stawać się'},
        // {inf: 'begin', pastSimp: 'began', pastPrac: 'begun', pl: 'zaczynać'},
        // {inf: 'break', pastSimp: 'broke', pastPrac: 'broken', pl: 'łamać'},
        // {inf: 'bring', pastSimp: 'brought', pastPrac: 'brought', pl: 'przynosić'},
        // {inf: 'build', pastSimp: 'built', pastPrac: 'built', pl: 'budować'},
        // {inf: 'burn', pastSimp: 'burnt', pastPrac: 'burnt', pl: 'spalić'},
        // {inf: 'buy', pastSimp: 'bought', pastPrac: 'bought', pl: 'kupować'},

        // {inf: 'burst', pastSimp: 'burst', pastPrac: 'burst', pl: 'wybuchać, pękać'},
        // {inf: 'can', pastSimp: 'could', pastPrac: 'been able to', pl: 'umieć, móc, potrafić'},

        // {inf: 'catch', pastSimp: 'caught', pastPrac: 'caught', pl: 'chwytać, łapać'},
        // {inf: 'choose', pastSimp: 'chose', pastPrac: 'chosen', pl: 'wybierać'},
        // {inf: 'come', pastSimp: 'came', pastPrac: 'come', pl: 'przybywać'},
        // {inf: 'cost', pastSimp: 'cost', pastPrac: 'cost', pl: 'kosztować'},
        // {inf: 'cut', pastSimp: 'cut', pastPrac: 'cut', pl: 'ciąć'},
        // {inf: 'do', pastSimp: 'did', pastPrac: 'done', pl: 'robić'},
        // {inf: 'dream', pastSimp: 'dreamt', pastPrac: 'dreamt', pl: 'śnić'},
        // {inf: 'drink', pastSimp: 'drank', pastPrac: 'drunk', pl: 'pić'},

        // {inf: 'dig', pastSimp: 'dug', pastPrac: 'dug', pl: 'wykopywać / kopać'},
        // {inf: 'draw', pastSimp: 'drew', pastPrac: 'drawn', pl: 'narysować / naszkicować'},
        // {inf: 'drive', pastSimp: 'drove', pastPrac: 'driven', pl: 'kierować'},
        // {inf: 'eat', pastSimp: 'ate', pastPrac: 'eaten', pl: 'jeść'},
        // {inf: 'fall', pastSimp: 'fell', pastPrac: 'fallen', pl: 'upadać'},
        // {inf: 'feed', pastSimp: 'fed', pastPrac: 'fed', pl: 'żywić / karmić'},
        // {inf: 'feel', pastSimp: 'felt', pastPrac: 'felt', pl: 'czuć'},
        // {inf: 'fight', pastSimp: 'fought', pastPrac: 'fought', pl: 'walczyć'},
        // {inf: 'find', pastSimp: 'found', pastPrac: 'found', pl: 'znajdować'},
        // {inf: 'fly', pastSimp: 'flew', pastPrac: 'flown', pl: 'latać'},
        // {inf: 'forget', pastSimp: 'forgot', pastPrac: 'forgotten', pl: 'zapominać'},
        // {inf: 'forgive', pastSimp: 'forgave', pastPrac: 'forgiven', pl: 'wybaczać'},
        // {inf: 'get', pastSimp: 'got', pastPrac: 'got', pl: 'dostawać'},
        // {inf: 'give', pastSimp: 'gave', pastPrac: 'given', pl: 'dawać'},
        // {inf: 'go', pastSimp: 'went', pastPrac: 'gone/been', pl: 'iść / jechać'},
        // {inf: 'grow', pastSimp: 'grew', pastPrac: 'grown', pl: 'rosnąć'},
        // {inf: 'hang', pastSimp: 'hanged/hung', pastPrac: 'hanged/hung', pl: 'wieszać / się (kogoś / coś)'},
        // {inf: 'have', pastSimp: 'had', pastPrac: 'had', pl: 'mieć'},
        // {inf: 'hear', pastSimp: 'heard', pastPrac: 'heard', pl: 'słyszeć'},
        // {inf: 'hide', pastSimp: 'hid', pastPrac: 'hid', pl: 'ukrywać / się'},
        // {inf: 'hit', pastSimp: 'hit', pastPrac: 'hit', pl: 'uderzać'},
        // {inf: 'hold', pastSimp: 'held', pastPrac: 'held', pl: 'trzymać'},
        // {inf: 'hurt', pastSimp: 'hurt', pastPrac: 'hurt', pl: 'ranić'},
        // {inf: 'keep', pastSimp: 'kept', pastPrac: 'kept', pl: 'trzymać'},
        // {inf: 'know', pastSimp: 'knew', pastPrac: 'known', pl: 'znać / wiedzieć'},
        // {inf: 'lead', pastSimp: 'led', pastPrac: 'led', pl: 'prowadzić'},
        // {inf: 'learned', pastSimp: 'learned/learnt', pastPrac: 'learned / learnt', pl: 'uczyc / się'},
        // {inf: 'leave', pastSimp: 'left', pastPrac: 'left', pl: 'opuszczać/wyjeżdżać'},
        // {inf: 'lend', pastSimp: 'lent', pastPrac: 'lent', pl: 'pożyczać / komuś'},
        // {inf: 'let', pastSimp: 'let', pastPrac: 'let', pl: 'pozwalać'},
        // {inf: 'lie', pastSimp: 'lay', pastPrac: 'lain', pl: 'leżeć'},
        // {inf: 'light', pastSimp: 'lit', pastPrac: 'lighted', pl: 'zapalać / podpalać'},
        // {inf: 'lose', pastSimp: 'lost', pastPrac: 'lost', pl: 'gubic/tracić'},
        // {inf: 'make', pastSimp: 'made', pastPrac: 'made', pl: 'robić'},
        // {inf: 'mean', pastSimp: 'mean', pastPrac: 'meant', pl: 'znaczyć'},
        // {inf: 'meet', pastSimp: 'met', pastPrac: 'met', pl: 'spotykać'},
        // {inf: 'must/have to', pastSimp: 'had to', pastPrac: 'had to', pl: 'musieć'},
        // {inf: 'pay', pastSimp: 'paid', pastPrac: 'paid', pl: 'płacić'},
        // {inf: 'put', pastSimp: 'put', pastPrac: 'put', pl: 'kłaść'},
        // {inf: 'read', pastSimp: 'read', pastPrac: 'read', pl: 'czytać'},
        // {inf: 'ride', pastSimp: 'rode', pastPrac: 'ridden', pl: 'jeździć (na czymś)'},
        // {inf: 'ring', pastSimp: 'rang', pastPrac: 'rung', pl: 'dzwonić'},
        // {inf: 'run', pastSimp: 'ran', pastPrac: 'run', pl: 'biec'},
        // {inf: 'say', pastSimp: 'said', pastPrac: 'said', pl: 'mówić'},
        // {inf: 'see', pastSimp: 'saw', pastPrac: 'seen', pl: 'widzieć'},
        // {inf: 'sell', pastSimp: 'sold', pastPrac: 'sold', pl: 'sprzedawać'},
        // {inf: 'send', pastSimp: 'sent', pastPrac: 'sent', pl: 'wysyłać'},
        // {inf: 'set', pastSimp: 'set', pastPrac: 'set', pl: 'umieszczać / postawić'},
        // {inf: 'shine', pastSimp: 'shone', pastPrac: 'shone', pl: 'zaświecić (czymś)'},
        // {inf: 'show', pastSimp: 'showed', pastPrac: 'shown', pl: 'pokazywać'},
        // {inf: 'shut', pastSimp: 'shut', pastPrac: 'shut', pl: 'zamykać / zatrzaskiwać'},
        // {inf: 'sing', pastSimp: 'sang', pastPrac: 'sung', pl: 'śpiewać'},
        // {inf: 'sink', pastSimp: 'sank', pastPrac: 'sunk', pl: 'tonąć'},
        // {inf: 'sit', pastSimp: 'sat', pastPrac: 'sat', pl: 'siedzieć'},
        // {inf: 'sleep', pastSimp: 'slept', pastPrac: 'slept', pl: 'spać'},
        // {inf: 'smell', pastSimp: 'smelled', pastPrac: 'smelt', pl: 'wąchać / pachnieć'},
        // {inf: 'speak', pastSimp: 'spoke', pastPrac: 'spoken', pl: 'mówić'},
        // {inf: 'spend', pastSimp: 'spent', pastPrac: 'spent', pl: 'spędzać'},
        // {inf: 'spill', pastSimp: 'spilt', pastPrac: 'spilled', pl: 'rozlewać'},
        // {inf: 'stand', pastSimp: 'stood', pastPrac: 'stood', pl: 'stać'},
        // {inf: 'steal', pastSimp: 'stole', pastPrac: 'stolen', pl: 'kraść'},
        // {inf: 'swim', pastSimp: 'swam', pastPrac: 'swum', pl: 'pływać'},
        // {inf: 'take', pastSimp: 'took', pastPrac: 'taken', pl: 'brać'},
        // {inf: 'teach', pastSimp: 'taught', pastPrac: 'taught', pl: 'uczyć'},
        // {inf: 'tear', pastSimp: 'torn', pastPrac: 'torn', pl: 'drzeć / rozrywać'},
        // {inf: 'tell', pastSimp: 'told', pastPrac: 'told', pl: 'mówić'},
        // {inf: 'think', pastSimp: 'thought', pastPrac: 'thought', pl: 'mysleć'},
        // {inf: 'throw', pastSimp: 'threw', pastPrac: 'thrown', pl: 'wyrzucać'},
        // {inf: 'understand', pastSimp: 'understood', pastPrac: 'understood', pl: 'rozumieć'},
        // {inf: 'wake', pastSimp: 'woke', pastPrac: 'woken', pl: 'budzić się'},
        // {inf: 'wear', pastSimp: 'wore', pastPrac: 'wore', pl: 'być ubranym w coś'},
        // {inf: 'win', pastSimp: 'won', pastPrac: 'won', pl: 'wygrywać'},
        // {inf: 'write', pastSimp: 'wrote', pastPrac: 'written', pl: 'pisać'},
        // ],
        presentVerb: {},
        verbsListKnown: [],
        verbsListTemp: [],
        verbInf: '',
        verbPastSimple: '',
        verbPastParticiple: '',
        random: 0,
		data: '',
		active: false,

        correctAnswers: false,
        emptyFieldsError: false,
        allVerbsCorrect: false,
        isSomeError: false,
        settingsShow: false,
        repeatVerbs: false,
        numberOfRepeatVerbs: 1,
        countKnownVerbsIfMoreRepeats: [],
        useFullVerbsList: true,
        chechBtnDisabled: false,
        knownAllVerbs: false,
        allBtnDisabled: false,
        verbsListSelect: 1,
        pickAnyVerbError: false,
        noMistakes: false,
        noMistakesError: false,
        linkShow: false,
        shareLink: '',
        linkCopyOk2: false,
        verbQuestionSetting: 1,
        verbShowTypeSetting: null,

        numberOfmistakes: 0,
    },
    methods: {
        test() {

        },
        verbQuestionChange() {
            this.newVerb();
        },
        verbQuestion() {

            switch (parseInt(this.verbQuestionSetting)) {
                case 1:
                    return this.presentVerb.pl;
                    break;

                case 2:
                    return this.presentVerb.inf;
                    break;

                case 3:
                    return this.presentVerb.pastSimp;
                    break;

                case 4:
                    return this.presentVerb.pastPrac;
                    break;

                case 5:
                    return this.randomVerbQuestion();
                    break;
            }
        },
        randomVerbQuestion() {
            var myArray = [this.presentVerb.pl, this.presentVerb.inf, this.presentVerb.pastSimp, this.presentVerb.pastPrac];
            var rand = myArray[Math.floor(Math.random() * myArray.length)];
            return rand;
        },
        copyLink() {

            node = document.getElementById('sharedlink');

            if (document.body.createTextRange) {
                const range = document.body.createTextRange();
                range.moveToElementText(node);
                range.select();
            } else if (window.getSelection) {
                const selection = window.getSelection();
                const range = document.createRange();
                range.selectNodeContents(node);
                selection.removeAllRanges();
                selection.addRange(range);
            } else {
                console.warn("Could not select text in node: Unsupported browser.");
            }

            try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'successful' : 'unsuccessful';
                let v = this;

                // pokazanie potwierdzenia
                setTimeout(function() {
                    v.linkCopyOk2 = true;
                }, 100);
                setTimeout(function() {
                    v.linkCopyOk2 = false;
                }, 2000);

                console.log('Copying text command was ' + msg);
            } catch (err) {
                console.log('Oops, unable to copy');
                console.log(err);
            }
        },
        shareLinkUrl() {
            let share = window.location.protocol + "//" + window.location.host + window.location.pathname;
            if (location.search.length > 0) {
                share = share + location.search;
            }
            this.shareLink = share;
        },
        getFromUrl() {
            if (location.search.substring(1).length < 1 ) {
                return;
            }

            var urlSearch = JSON.parse('{"' + decodeURI(location.search.substring(1)).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"') + '"}');

            if (Object.keys(urlSearch).length > 0 ) {
                if ("group" in urlSearch) {
                    let set = 1;
                    if (urlSearch.group > 0 && urlSearch.group < 11) {
                        set = urlSearch.group;
                    }
                    this.verbsListSelect = set;
                    this.useFullVerbsList = false;
                }
                if ("repeat" in urlSearch) {
                    this.repeatVerbs = true;
                    this.numberOfRepeatVerbs = urlSearch.repeat;
                }
                if ("noMistakes" in urlSearch) {
                    this.noMistakes = true;
                }
                if ("verbShowType" in urlSearch) {
                    this.verbQuestionSetting = urlSearch.verbShowType;
                }
                this.setVerbsListChange();
            }
        },
        setToUrl() {

            let getUrl = window.location;
            let baseUrl = getUrl .protocol + "//" + getUrl.host + getUrl.pathname;
            let url = '?verbShowType=' + this.verbQuestionSetting;

            if (!this.useFullVerbsList) {
                url += '&group=' + this.verbsListSelect;
            }
            if (this.repeatVerbs) {
                url += '&repeat=' + this.numberOfRepeatVerbs;
            }
            if (this.noMistakes) {
                url += '&noMistakes=1';
            }

            let state = {};
            let title = '';
            history.pushState(state, title, baseUrl + url);
            this.shareLink = baseUrl + url;

        },
        goTo(set) {

            let getUrl = window.location;
            let baseUrl = getUrl .protocol + "//" + getUrl.host + getUrl.pathname;
            let url = '/';

            if (set == 'refresh') {
                url = baseUrl + location.search;
            } else if (set.length > 0) {
                url = baseUrl + set;
            } else {
                url = baseUrl;
            }
            window.location.href = url;

        },
        checkIfIsChecked(name) {

            for (let i = 0; i < this.verbsListTemp.length; i++) {
                const element = this.verbsListTemp[i];
                if (element.inf == name) {
                    return true;
                }
            }

        },
        closeSettings() {

            if (this.verbsListTemp.length < 1) {
                this.pickAnyVerbError = true;
                return;
            }
            this.newVerb();
            this.settingsShow = false;
            this.setToUrl();

        },
        pickAnyVerbs(name, id) {
            this.pickAnyVerbError = false;
            let isVerbChecked = document.getElementById(name).checked;
            // usunięcie z listy
            for (let i = 0; i < this.verbsListTemp.length; i++) {
                const element = this.verbsListTemp[i];
                if (element.inf == name) {
                    this.verbsListTemp.splice(i, 1);
                }
            }

            // sprawdzenie indexu czasownika do operacji
            let operationIndex = 0;
            for (let index = 0; index < this.verbsList.length; index++) {
                const elementVerbsList = this.verbsList[index];
                if (Object.values(elementVerbsList).indexOf(name) > -1) {
                    operationIndex = index;
                }
            }

            if (isVerbChecked) {
                this.verbsListTemp.push(this.verbsList[operationIndex]);
            }

        },
        setUseFullListChange() {
            if (!this.useFullVerbsList) {
                this.verbsListTemp = this.verbsList;
                this.pickAnyVerbError = false;
            } else {
                this.setVerbsListChange();
            }
        },
        setVerbsListChange() {
            this.pickAnyVerbError = false;
            this.verbsListTemp = [];
            let listOfVerbs = [];

            for (let i = 0; i < this.verbsGroups.length; i++) {
                const element = this.verbsGroups[i].number;
                if (element == this.verbsListSelect) {
                    listOfVerbs = this.verbsGroups[i].list.replace(/\s+/g, '').split(',');
                }
            }

            for (let i = 0; i < listOfVerbs.length; i++) {
                const verbFromSelect = listOfVerbs[i];

                for (let index = 0; index < this.verbsList.length; index++) {
                    const verbFromFullList = this.verbsList[index].inf;
                    if (verbFromSelect == verbFromFullList) {
                        this.verbsListTemp.push(this.verbsList[index]);
                    }
                }
            }
        },
        randomNumber() {
            this.correctAnswers = false;
            this.cleanForm();
            this.cleanAlertsInfo();
            this.$refs.fieldInfVerb.select();
            let numberOfVerbs = this.verbsListTemp.length;
            let random = Math.floor(Math.random() * numberOfVerbs);

            if (this.random == random) {
                random = Math.floor(Math.random() * numberOfVerbs);
            }

            return random;
        },
        numberOfVerbssss() {
            return this.verbsListTemp.length;
        },
        newVerb() {
            this.chechBtnDisabled = false;
            this.knownAllVerbs = false;
            this.random = this.randomNumber();
            this.presentVerb = this.verbsListTemp[this.random];
            this.verbShowTypeSetting = this.verbQuestion();
            this.$refs.fieldInfVerb.select();

        },
        choosenVerbsList() {
            this.verbsListTemp = this.verbsList.slice();
        },
        showHints() {
            this.$refs.fieldInfVerb.select();
            this.correctAnswers = true;
        },
        checkVerbs() {
            this.cleanAlertsInfo();
            this.$refs.fieldInfVerb.select();

            if (this.verbInf === '' || this.verbPastSimple === '' || this.verbPastParticiple === '') {
                this.emptyFieldsError = true;
                return;
            }

            if (this.verbInf.toLowerCase() == this.verbsListTemp[this.random].inf &&
                this.verbPastSimple.toLowerCase() == this.verbsListTemp[this.random].pastSimp &&
                this.verbPastParticiple.toLowerCase() == this.verbsListTemp[this.random].pastPrac) {
                this.allVerbsCorrect = true;
                this.chechBtnDisabled = true;
                this.$refs.newVerbBtn.focus();

                // delete from list and add to known list
                if (this.repeatVerbs && parseInt(this.numberOfRepeatVerbs) == 1) {
                    this.verbsListKnown.push(this.verbsListTemp[this.random]);
                    this.verbsListTemp.splice(this.random, 1);
                    if (this.verbsListTemp.length < 1) {
                        this.knownAllVerbs = true;
                        this.allBtnDisabled = true;
                    }
                } else if (this.repeatVerbs && parseInt(this.numberOfRepeatVerbs) > 1) {

                    let numberOfRepeatVerbs = parseInt(this.numberOfRepeatVerbs) - 1;

                    if (this.countKnownVerbsIfMoreRepeats.length > 0) {

                        let flag = false;
                        for (let index = 0; index < this.countKnownVerbsIfMoreRepeats.length; index++) {
                            const element = this.countKnownVerbsIfMoreRepeats[index];

                            if (Object.values(element).indexOf(this.presentVerb.inf) > -1) {
                                flag = true;
                                if (element.counter < numberOfRepeatVerbs) {
                                    this.countKnownVerbsIfMoreRepeats.push({
                                        name:  this.presentVerb.inf,
                                        counter: element.counter + 1
                                    });
                                    this.countKnownVerbsIfMoreRepeats.splice(index, 1);
                                    return;

                                } else if (element.counter == numberOfRepeatVerbs) {

                                    // sprawdzenie indexu czasownika do operacji (usuiniecie z listy "do nauki" i dodanie do listy "poznane")
                                    let operationIndex = 0;
                                    for (let index = 0; index < this.verbsListTemp.length; index++) {
                                        const elementVerbsListTemp = this.verbsListTemp[index];
                                        if (Object.values(elementVerbsListTemp).indexOf(element.name) > -1) {
                                            operationIndex = index;
                                        }
                                    }

                                    this.verbsListKnown.push(this.verbsListTemp[operationIndex]);
                                    this.verbsListTemp.splice(operationIndex, 1);
                                    this.countKnownVerbsIfMoreRepeats.splice(index, 1);

                                    if (this.verbsListTemp.length < 1) {
                                        this.knownAllVerbs = true;
                                        this.allBtnDisabled = true;
                                    }
                                    return;
                                }
                            }
                        }

                        if (flag == false) {
                            this.countKnownVerbsIfMoreRepeats.push({
                                name:  this.presentVerb.inf,
                                counter: 1
                            });
                        }

                    } else {
                        this.countKnownVerbsIfMoreRepeats.push({
                            name:  this.presentVerb.inf,
                            counter: 1
                        });
                    }
                }

                return;
            }

            if (this.verbInf.toLowerCase() != this.verbsListTemp[this.random].inf ||
                this.verbPastSimple.toLowerCase() != this.verbsListTemp[this.random].pastSimp ||
                this.verbPastParticiple.toLowerCase() != this.verbsListTemp[this.random].pastPrac) {
                this.isSomeError = true;
                this.numberOfmistakes++;
                if (this.noMistakes) {
                    this.noMistakesError = true;
                }
                return;
            }
        },
        cleanForm() {
            this.verbInf = '';
            this.verbPastSimple = '';
            this.verbPastParticiple = '';
        },
        cleanAlertsInfo() {
            this.emptyFieldsError = false;
            this.allVerbsCorrect = false;
            this.isSomeError = false;
        },
        repeatVerbsClick() {

            if (this.repeatVerbs) {
                this.verbsListTemp = [];
                this.verbsListTemp = this.verbsList.slice();
            }
            this.verbsListKnown = [];
        },



		homeLearnChooseMouseOver() {
			this.active = !this.active;
		}
    },
    mounted() {
		axios.get('home/start_data')
		.then((response) => {
			let resp = response.data;
			console.log(resp);
			this.data = resp.allVerbs;
		});

        this.verbsListTemp = this.verbsList.slice();
        this.getFromUrl();
        // this.random = this.randomNumber();
        this.newVerb();
        this.shareLinkUrl();
    },

})
