<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['test'] = "[
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

		]";
		$this->load->view('home', $data);
	}
}
