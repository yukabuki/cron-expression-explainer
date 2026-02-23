<?php declare(strict_types = 1);

return [
	'listSeparator' => ', ',
	'list' => '{values} et {lastValue}',
	'step-all-minute' => 'toutes les {step} minutes',
	'step-all-hour' => 'toutes les {step} heures',
	'step-all-day-of-week' => 'tous les {step} jours de la semaine',
	'step-all-day-of-month' => 'tous les {step} jours du mois',
	'step-all-month' => 'tous les {step} mois',
	'step-minute' => 'toutes les {step} minutes {part}',
	'step-hour' => 'toutes les {step} heures {part}',
	'step-day-of-week' => 'tous les {step} jours de la semaine {part}',
	'step-day-of-month' => 'tous les {step} jours du mois {part}',
	'step-month' => 'tous les {step} mois {part}',
	'range-minute' => 'de {left} à {right}',
	'range-minute-named' => 'chaque minute de {left} à {right}',
	'range-hour' => 'de {left} à {right}',
	'range-hour-named' => 'chaque heure de {left} à {right}',
	'range-day-of-week' => 'de {left} à {right}',
	'range-day-of-week-named' => 'chaque jour de la semaine de {left} à {right}',
	'range-day-of-month' => 'de {left} à {right}',
	'range-day-of-month-named' => 'chaque jour du mois de {left} à {right}',
	'range-month' => 'de {left} à {right}',
	'range-month-named' => 'chaque mois de {left} à {right}',
	'second' => '{second, plural,
      one {chaque seconde}
      other {toutes les # secondes}
    }',
	'every-minute' => 'chaque minute',
	'before-minute' => 'à ',
	'minute' => '{minute}',
	'minute-named' => 'minute {minute}',
	'before-hour' => ' passé ',
	'hour' => '{hour}',
	'hour-named' => 'heure {hour}',
	'between-day-of-month-and-week' => ' et',
	'before-day-of-week' => ' le ',
	'day-of-week' => '{dayNumber, select,
      1 {lundi}
      2 {mardi}
      3 {mercredi}
      4 {jeudi}
      5 {vendredi}
      6 {samedi}
      7 {dimanche}
      other {{dayNumber} - inconnu}
    }',
	'day-of-week-nth' => '{nth, selectordinal,
      one {#er}
      other {#ème}
	} {day}',
	'day-of-week-last' => 'le dernier {day}',
	'before-day-of-month' => ' le ',
	'day-of-month' => '{day}',
	'day-of-month-named' => 'jour du mois {day}',
	'day-of-month-last-day' => 'le dernier jour du mois',
	'day-of-month-last-weekday' => 'le dernier jour ouvrable',
	'day-of-month-nearest-weekday' => 'le jour ouvrable le plus proche du {day, selectordinal,
      one {#er}
      other {#ème}
    }',
	'before-month' => ' en ',
	'month' => '{month, select,
      1 {janvier}
      2 {février}
      3 {mars}
      4 {avril}
      5 {mai}
      6 {juin}
      7 {juillet}
      8 {août}
      9 {septembre}
      10 {octobre}
      11 {novembre}
      12 {décembre}
      other {{month} - inconnu}
    }',
	'hour+minute' => 'à {hour}:{minute}',
	'day-of-month+month' => 'le {day, selectordinal,
      one {#er}
      other {#}
    } {month, select,
      1 {janvier}
      2 {février}
      3 {mars}
      4 {avril}
      5 {mai}
      6 {juin}
      7 {juillet}
      8 {août}
      9 {septembre}
      10 {octobre}
      11 {novembre}
      12 {décembre}
      other {{month} - inconnu}
    }',
	'timezone' => 'dans le fuseau horaire {tz}',
];
