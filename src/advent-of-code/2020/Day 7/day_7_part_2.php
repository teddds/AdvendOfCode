<?php
declare(strict_types=1);

namespace AdventOfCode\Y2020\Day7\Part2;

$source = 'muted lavender bags contain 5 dull brown bags, 4 pale maroon bags, 2 drab orange bags.
plaid aqua bags contain 1 posh violet bag, 5 pale yellow bags, 4 bright salmon bags.
wavy lime bags contain 3 vibrant indigo bags, 1 posh gray bag.
pale coral bags contain 5 mirrored olive bags, 2 posh salmon bags.
faded chartreuse bags contain 1 plaid blue bag, 4 clear salmon bags, 5 muted teal bags.
vibrant indigo bags contain 4 pale red bags, 1 vibrant violet bag.
vibrant salmon bags contain 1 dull crimson bag, 5 dim coral bags, 4 pale salmon bags, 3 pale fuchsia bags.
light yellow bags contain 5 clear beige bags, 3 dotted beige bags.
muted plum bags contain 5 posh silver bags, 3 pale turquoise bags, 3 faded chartreuse bags.
mirrored indigo bags contain 4 pale tan bags, 1 posh indigo bag, 3 shiny salmon bags, 4 wavy indigo bags.
pale indigo bags contain 3 dark white bags.
plaid indigo bags contain 4 mirrored teal bags.
shiny brown bags contain 1 striped gold bag.
drab violet bags contain 1 drab magenta bag, 5 posh orange bags, 1 mirrored brown bag, 4 wavy salmon bags.
pale olive bags contain 2 light black bags, 2 faded tomato bags.
dark teal bags contain 3 striped fuchsia bags.
plaid white bags contain 4 shiny salmon bags.
muted gold bags contain 5 faded lavender bags, 3 striped aqua bags.
pale cyan bags contain 3 muted tan bags, 5 bright purple bags, 1 posh blue bag.
pale tan bags contain 3 bright teal bags.
bright aqua bags contain 5 plaid magenta bags, 5 muted lavender bags, 4 dim turquoise bags, 1 shiny turquoise bag.
dark gold bags contain 4 dull indigo bags, 5 mirrored orange bags, 5 bright teal bags, 1 dim gold bag.
muted salmon bags contain 3 muted gray bags, 4 pale salmon bags.
striped plum bags contain 1 dark indigo bag, 1 vibrant violet bag.
posh yellow bags contain 3 shiny tan bags, 4 dull lavender bags, 5 pale yellow bags.
plaid lime bags contain 2 bright brown bags, 4 dull lavender bags.
mirrored gray bags contain 4 mirrored teal bags, 3 muted indigo bags.
muted olive bags contain 3 dim fuchsia bags, 2 dim salmon bags, 4 shiny maroon bags.
dotted blue bags contain 4 plaid orange bags, 5 faded black bags, 2 muted black bags, 5 mirrored lime bags.
wavy beige bags contain 5 dark aqua bags, 3 mirrored lavender bags, 3 drab fuchsia bags.
shiny indigo bags contain 3 wavy black bags, 2 dull plum bags.
drab lavender bags contain 4 mirrored chartreuse bags.
vibrant tomato bags contain 3 wavy white bags, 1 dull plum bag.
plaid teal bags contain 3 mirrored bronze bags.
pale chartreuse bags contain no other bags.
muted coral bags contain 1 striped lavender bag, 5 dotted crimson bags, 2 faded tomato bags.
faded aqua bags contain 2 bright plum bags, 3 faded gold bags, 1 mirrored bronze bag, 2 dull lavender bags.
pale brown bags contain 1 clear salmon bag, 4 drab tan bags, 1 light orange bag, 1 light silver bag.
drab orange bags contain 3 faded beige bags.
pale blue bags contain 3 pale plum bags, 3 dotted green bags, 4 dark lime bags, 5 clear beige bags.
dull purple bags contain 5 posh aqua bags, 1 muted blue bag, 1 bright gray bag, 1 muted chartreuse bag.
bright silver bags contain 5 dark turquoise bags, 2 dark teal bags, 1 muted tan bag, 3 vibrant tan bags.
dim silver bags contain 4 plaid black bags.
faded violet bags contain 5 dark maroon bags.
pale maroon bags contain 5 dark maroon bags, 4 drab chartreuse bags.
shiny green bags contain 1 bright chartreuse bag.
vibrant crimson bags contain 3 dotted red bags, 2 striped violet bags, 1 light bronze bag.
clear lavender bags contain 1 faded teal bag, 5 clear cyan bags.
mirrored red bags contain 2 dim gray bags, 2 drab orange bags, 4 muted purple bags, 3 muted white bags.
striped green bags contain 2 light purple bags, 4 light gold bags, 3 posh magenta bags.
dim yellow bags contain 1 light crimson bag, 2 muted indigo bags.
dotted orange bags contain 3 wavy salmon bags, 1 dim fuchsia bag.
vibrant gray bags contain 1 plaid brown bag, 5 mirrored black bags, 4 plaid olive bags.
mirrored silver bags contain 2 striped magenta bags, 3 striped coral bags.
pale magenta bags contain 4 posh tomato bags, 4 plaid blue bags, 2 shiny gold bags, 3 faded beige bags.
vibrant black bags contain 4 dotted brown bags.
muted violet bags contain 1 clear tomato bag, 1 striped beige bag.
clear salmon bags contain 1 drab chartreuse bag, 4 dotted beige bags, 5 light crimson bags, 3 dotted orange bags.
posh indigo bags contain 3 mirrored teal bags, 5 drab gold bags.
wavy black bags contain 5 dotted purple bags, 5 plaid chartreuse bags, 3 striped gold bags.
mirrored lavender bags contain 2 dim black bags.
shiny maroon bags contain 2 dotted beige bags.
drab magenta bags contain 2 dim yellow bags.
pale orange bags contain 1 shiny purple bag, 5 striped turquoise bags, 2 light crimson bags.
shiny beige bags contain 5 clear white bags, 2 striped turquoise bags, 4 pale yellow bags, 1 muted black bag.
striped cyan bags contain 2 plaid yellow bags, 2 clear teal bags, 3 wavy olive bags, 4 posh violet bags.
dull cyan bags contain 1 striped salmon bag.
vibrant green bags contain 4 dull coral bags, 4 drab yellow bags, 4 dark cyan bags.
wavy cyan bags contain 5 light salmon bags, 5 dim blue bags, 2 pale green bags, 1 faded indigo bag.
drab plum bags contain 3 dark magenta bags.
light aqua bags contain 4 bright bronze bags, 3 wavy lavender bags, 3 dull cyan bags, 2 bright green bags.
pale plum bags contain 5 clear plum bags.
vibrant silver bags contain 1 dim lavender bag, 4 bright teal bags.
wavy white bags contain 1 light crimson bag, 4 wavy salmon bags.
shiny chartreuse bags contain 2 plaid gray bags, 5 mirrored white bags.
dull chartreuse bags contain 1 dull cyan bag, 3 striped white bags, 4 posh indigo bags.
clear magenta bags contain 1 plaid coral bag, 5 light plum bags, 1 bright yellow bag.
muted white bags contain 2 dull salmon bags, 5 bright turquoise bags, 3 wavy gray bags, 1 plaid black bag.
dull brown bags contain 3 faded lavender bags.
muted turquoise bags contain 4 mirrored plum bags, 4 mirrored brown bags, 4 drab salmon bags, 4 mirrored tomato bags.
posh tomato bags contain 2 drab orange bags, 4 dim lavender bags.
shiny fuchsia bags contain 3 dull black bags, 5 wavy coral bags.
dim gray bags contain 3 drab gray bags.
striped olive bags contain 5 light purple bags, 5 wavy yellow bags, 1 striped fuchsia bag.
muted maroon bags contain 2 bright white bags.
light tomato bags contain 1 striped indigo bag, 5 plaid plum bags, 4 clear indigo bags, 4 drab tan bags.
plaid violet bags contain 2 dim coral bags.
striped chartreuse bags contain 2 shiny gray bags.
mirrored white bags contain 4 striped beige bags.
dim beige bags contain 3 wavy bronze bags, 4 vibrant silver bags, 1 striped white bag, 2 dark plum bags.
striped violet bags contain 5 dull teal bags, 2 vibrant red bags.
drab green bags contain 1 striped olive bag, 2 light salmon bags, 1 faded cyan bag, 3 vibrant fuchsia bags.
clear lime bags contain 2 plaid coral bags, 1 light lavender bag, 4 posh salmon bags.
striped indigo bags contain 2 pale maroon bags, 5 dotted aqua bags, 3 drab gray bags.
dim blue bags contain 5 faded bronze bags, 4 dark blue bags.
faded fuchsia bags contain 3 muted fuchsia bags, 1 light orange bag, 2 striped beige bags, 1 dotted red bag.
plaid red bags contain 5 pale maroon bags, 3 dark beige bags, 2 striped fuchsia bags.
drab silver bags contain 1 dim salmon bag, 2 shiny salmon bags.
dark chartreuse bags contain 1 dull aqua bag.
clear chartreuse bags contain 5 faded brown bags, 3 dotted aqua bags.
plaid silver bags contain 5 pale red bags.
wavy chartreuse bags contain 5 mirrored red bags, 1 dull teal bag.
clear gray bags contain 5 striped salmon bags, 5 plaid silver bags, 1 clear black bag.
shiny white bags contain 1 shiny gray bag, 5 vibrant gray bags.
posh coral bags contain 2 muted white bags.
light red bags contain 5 muted indigo bags, 1 wavy fuchsia bag.
dull fuchsia bags contain 4 light plum bags, 4 faded red bags.
dotted gold bags contain 1 plaid brown bag, 4 dotted aqua bags, 2 pale purple bags.
faded orange bags contain 3 dotted beige bags.
bright coral bags contain 2 dark cyan bags, 1 wavy tan bag, 1 vibrant yellow bag.
striped brown bags contain 5 light yellow bags, 4 dull indigo bags, 4 clear maroon bags.
light fuchsia bags contain 3 dotted gray bags, 1 striped orange bag, 1 mirrored olive bag, 2 wavy fuchsia bags.
dotted bronze bags contain 2 dull salmon bags.
faded red bags contain 2 posh indigo bags, 5 dotted aqua bags.
wavy teal bags contain 3 faded tomato bags, 4 dark silver bags, 3 shiny cyan bags.
dim tomato bags contain 4 wavy silver bags, 3 drab red bags.
muted beige bags contain 1 bright gray bag, 1 dark red bag.
shiny yellow bags contain 2 light plum bags.
wavy indigo bags contain 1 faded red bag, 1 plaid yellow bag, 2 dull aqua bags.
plaid maroon bags contain 5 vibrant beige bags.
wavy tan bags contain 5 plaid maroon bags.
striped coral bags contain 1 pale silver bag, 4 clear beige bags, 3 dotted aqua bags, 3 striped turquoise bags.
shiny black bags contain 1 clear silver bag, 1 mirrored blue bag.
muted silver bags contain 1 posh teal bag, 4 faded teal bags, 4 plaid aqua bags, 2 striped olive bags.
pale gray bags contain 4 dotted silver bags.
light white bags contain 2 dull salmon bags, 5 vibrant violet bags, 1 dull black bag.
mirrored beige bags contain 3 dark teal bags, 3 wavy coral bags, 3 plaid black bags.
mirrored tomato bags contain 5 muted bronze bags, 2 drab gold bags, 4 dark plum bags.
dull magenta bags contain 1 wavy black bag, 5 dull gray bags.
pale crimson bags contain 3 wavy brown bags, 5 dark green bags, 3 pale fuchsia bags.
pale beige bags contain 3 posh black bags, 4 dotted gold bags, 1 plaid blue bag.
dull red bags contain 2 light chartreuse bags, 1 striped tomato bag, 4 plaid green bags, 3 dull chartreuse bags.
dotted violet bags contain 4 dark plum bags, 3 dull plum bags, 4 pale red bags.
muted bronze bags contain 2 muted teal bags, 5 shiny purple bags, 4 pale chartreuse bags, 4 wavy salmon bags.
dark coral bags contain 5 dull indigo bags, 1 vibrant plum bag, 2 mirrored black bags, 4 drab gold bags.
shiny magenta bags contain 5 light turquoise bags, 4 striped olive bags.
faded olive bags contain 2 clear white bags.
pale aqua bags contain 2 vibrant fuchsia bags.
vibrant yellow bags contain 4 muted teal bags, 1 mirrored teal bag.
dotted lime bags contain 5 dotted white bags, 2 wavy aqua bags, 3 pale salmon bags.
dark bronze bags contain 1 clear beige bag, 1 muted olive bag.
dim lavender bags contain 1 dull indigo bag, 2 shiny purple bags, 4 dull teal bags.
wavy gold bags contain 5 dull black bags, 1 muted fuchsia bag, 4 dark red bags, 1 light crimson bag.
striped crimson bags contain 5 shiny gray bags, 3 mirrored crimson bags, 2 drab chartreuse bags, 4 dull aqua bags.
dark aqua bags contain 1 bright indigo bag, 5 muted white bags, 2 shiny crimson bags, 3 mirrored orange bags.
posh black bags contain 3 pale tan bags, 1 dim brown bag, 5 clear green bags.
bright beige bags contain 4 dotted black bags.
dull maroon bags contain 1 drab red bag, 4 faded turquoise bags, 1 pale olive bag.
dull salmon bags contain 3 mirrored olive bags, 3 dull indigo bags, 1 dim brown bag, 4 shiny lime bags.
faded purple bags contain 4 faded indigo bags.
light beige bags contain 1 posh gray bag, 3 dotted white bags, 1 striped silver bag.
vibrant magenta bags contain 4 drab red bags, 1 dotted white bag, 5 striped aqua bags.
light maroon bags contain 1 dull black bag.
light olive bags contain 3 dull tan bags.
vibrant lime bags contain 2 dim lavender bags.
muted aqua bags contain 3 bright olive bags, 1 muted teal bag, 3 dull crimson bags.
dotted beige bags contain no other bags.
dotted indigo bags contain 2 light lavender bags, 5 dark white bags, 3 wavy gray bags, 4 plaid chartreuse bags.
drab yellow bags contain 4 mirrored aqua bags, 5 plaid olive bags, 5 dull black bags, 4 striped turquoise bags.
light lime bags contain 3 striped turquoise bags, 4 muted coral bags, 5 muted yellow bags, 4 mirrored silver bags.
dark crimson bags contain 2 light bronze bags, 1 vibrant chartreuse bag.
clear plum bags contain 1 muted indigo bag, 5 dim red bags, 2 pale orange bags, 5 light black bags.
mirrored violet bags contain 3 wavy salmon bags.
striped silver bags contain 5 bright olive bags, 5 dim brown bags, 2 posh blue bags, 1 posh purple bag.
posh gold bags contain 5 faded lavender bags.
striped lime bags contain 4 striped coral bags.
plaid tomato bags contain 2 dull white bags, 1 wavy white bag, 5 drab red bags.
drab tan bags contain 1 mirrored bronze bag, 1 mirrored tomato bag, 2 mirrored green bags.
posh purple bags contain 4 dull cyan bags.
plaid blue bags contain 2 muted fuchsia bags, 1 bright teal bag, 2 pale chartreuse bags.
dim lime bags contain 4 drab gold bags, 1 muted fuchsia bag, 1 posh tomato bag.
dark white bags contain 2 wavy gold bags.
bright red bags contain 4 light fuchsia bags, 1 plaid orange bag, 1 pale red bag.
wavy blue bags contain 4 striped red bags, 1 mirrored black bag.
light teal bags contain 1 faded orange bag, 5 muted white bags.
shiny blue bags contain 1 drab red bag, 3 shiny brown bags, 2 dark teal bags, 2 dotted silver bags.
bright gray bags contain 3 muted teal bags, 2 clear plum bags, 5 light olive bags, 5 dark red bags.
bright black bags contain 5 posh yellow bags, 1 striped maroon bag.
shiny gold bags contain 3 wavy gold bags, 2 plaid chartreuse bags, 2 shiny lime bags, 5 dull indigo bags.
striped teal bags contain 4 dark lime bags, 4 light yellow bags, 2 dull brown bags.
wavy coral bags contain 3 dim yellow bags, 1 clear red bag, 4 pale chartreuse bags.
plaid chartreuse bags contain 1 striped maroon bag, 5 dotted yellow bags.
pale turquoise bags contain 3 clear yellow bags, 2 dim coral bags.
vibrant plum bags contain 3 dotted yellow bags.
drab cyan bags contain 5 vibrant green bags.
wavy crimson bags contain 1 mirrored gray bag, 2 dim teal bags.
wavy maroon bags contain 3 pale tan bags.
light orange bags contain 4 vibrant silver bags, 2 dim olive bags, 2 drab red bags.
plaid brown bags contain 2 bright turquoise bags, 4 shiny tan bags, 2 dull indigo bags, 3 plaid olive bags.
posh silver bags contain 5 wavy coral bags.
wavy bronze bags contain 1 plaid yellow bag, 1 dim gold bag.
shiny violet bags contain 5 plaid coral bags, 2 mirrored brown bags.
posh lime bags contain 3 wavy bronze bags, 2 striped tomato bags, 2 pale tan bags.
dim salmon bags contain 3 dim brown bags, 5 drab chartreuse bags.
faded beige bags contain no other bags.
dotted gray bags contain 5 dark lime bags, 2 posh black bags, 3 muted fuchsia bags.
dull crimson bags contain 5 vibrant fuchsia bags.
drab brown bags contain 5 pale maroon bags, 5 light crimson bags.
bright blue bags contain 5 vibrant brown bags.
bright violet bags contain 1 light white bag, 5 clear beige bags, 2 dull crimson bags.
plaid magenta bags contain 2 light plum bags, 1 wavy white bag, 5 pale green bags, 1 bright tomato bag.
faded silver bags contain 5 light black bags, 5 mirrored teal bags, 5 vibrant plum bags.
wavy brown bags contain 4 faded gray bags, 3 dotted olive bags, 1 light silver bag.
clear teal bags contain 2 mirrored black bags, 2 wavy gold bags, 2 striped red bags, 5 light silver bags.
posh crimson bags contain 5 drab tan bags.
clear fuchsia bags contain 4 faded tomato bags, 1 dotted beige bag.
bright maroon bags contain 2 wavy teal bags, 2 shiny gray bags, 5 dull gray bags, 3 dull teal bags.
drab gray bags contain 3 dark white bags, 2 pale salmon bags, 4 bright teal bags.
vibrant brown bags contain 4 wavy salmon bags.
bright green bags contain 2 clear cyan bags, 3 wavy lavender bags, 2 plaid blue bags, 2 faded gold bags.
light salmon bags contain 1 muted tan bag, 5 plaid plum bags.
plaid bronze bags contain 4 mirrored chartreuse bags, 3 plaid turquoise bags, 2 wavy orange bags, 5 dotted yellow bags.
dull bronze bags contain 2 vibrant lime bags, 2 muted purple bags, 2 dark magenta bags.
bright orange bags contain 4 pale violet bags, 2 light fuchsia bags, 3 dull purple bags.
wavy fuchsia bags contain 4 dotted olive bags, 1 dull brown bag.
mirrored olive bags contain 4 muted fuchsia bags, 4 striped turquoise bags.
shiny salmon bags contain 2 dark white bags.
striped tan bags contain 4 mirrored purple bags.
dull coral bags contain 3 posh coral bags, 1 dotted green bag.
drab teal bags contain 4 wavy yellow bags, 5 mirrored aqua bags.
shiny tan bags contain 5 striped maroon bags, 5 vibrant red bags.
bright crimson bags contain 1 muted magenta bag.
shiny lime bags contain 1 faded teal bag, 1 light crimson bag.
posh white bags contain 3 posh orange bags, 4 pale gray bags, 5 dull maroon bags, 5 plaid plum bags.
dotted brown bags contain 1 vibrant indigo bag, 1 plaid olive bag.
faded coral bags contain 5 muted bronze bags, 3 mirrored lavender bags.
faded brown bags contain 1 bright turquoise bag, 3 posh indigo bags, 2 pale fuchsia bags, 3 dark indigo bags.
vibrant aqua bags contain 2 clear beige bags, 3 posh olive bags, 3 dark turquoise bags, 2 posh magenta bags.
dark turquoise bags contain 1 striped gold bag, 1 mirrored red bag.
drab gold bags contain 2 clear beige bags, 4 striped turquoise bags, 1 pale orange bag, 1 clear salmon bag.
mirrored green bags contain 4 dotted beige bags, 3 pale chartreuse bags, 3 light crimson bags.
clear violet bags contain 3 posh orange bags, 4 faded beige bags, 3 drab red bags, 4 shiny salmon bags.
posh plum bags contain 1 shiny white bag, 1 striped lavender bag.
vibrant purple bags contain 5 bright teal bags.
dark salmon bags contain 4 striped olive bags, 5 mirrored crimson bags, 5 plaid lime bags, 3 dark tomato bags.
shiny silver bags contain 2 vibrant red bags.
dull turquoise bags contain 3 faded crimson bags, 1 drab maroon bag, 5 drab gold bags.
dull orange bags contain 1 dark yellow bag, 3 bright beige bags.
bright bronze bags contain 3 posh salmon bags, 1 mirrored violet bag, 2 muted white bags, 3 dotted orange bags.
bright teal bags contain 4 dim fuchsia bags.
clear turquoise bags contain 1 faded teal bag, 2 dull teal bags.
wavy magenta bags contain 4 dim teal bags, 3 mirrored bronze bags, 3 plaid plum bags, 5 wavy lavender bags.
faded bronze bags contain 2 striped salmon bags, 3 dark red bags, 1 dark indigo bag.
faded plum bags contain 1 clear green bag.
faded maroon bags contain 1 striped maroon bag, 5 dim black bags, 1 vibrant indigo bag.
muted teal bags contain 4 light crimson bags, 5 drab chartreuse bags.
vibrant maroon bags contain 3 dark fuchsia bags, 3 plaid turquoise bags, 1 pale silver bag, 4 shiny cyan bags.
plaid crimson bags contain 3 mirrored olive bags.
clear tan bags contain 1 vibrant purple bag, 1 wavy aqua bag.
clear aqua bags contain 4 bright white bags.
striped red bags contain 3 wavy coral bags, 3 dark white bags, 4 muted fuchsia bags, 4 posh tomato bags.
posh violet bags contain 1 muted fuchsia bag, 3 dim coral bags, 2 drab orange bags.
plaid cyan bags contain 2 shiny indigo bags.
light chartreuse bags contain 5 wavy tan bags, 4 clear indigo bags.
vibrant lavender bags contain 3 light gray bags, 4 striped beige bags, 5 dark maroon bags, 3 drab fuchsia bags.
dim red bags contain 4 pale orange bags, 3 drab chartreuse bags.
vibrant turquoise bags contain 3 clear tomato bags, 4 posh blue bags.
muted green bags contain 4 clear bronze bags, 3 dotted black bags, 3 dull beige bags.
faded salmon bags contain 2 drab gold bags, 2 clear red bags, 2 dark indigo bags, 5 plaid teal bags.
posh chartreuse bags contain 4 dotted orange bags.
dotted turquoise bags contain 5 shiny fuchsia bags, 2 vibrant indigo bags, 3 vibrant fuchsia bags, 5 muted green bags.
wavy turquoise bags contain 1 dark white bag, 4 posh tan bags.
clear purple bags contain 2 vibrant gray bags, 3 dark plum bags, 1 shiny fuchsia bag, 4 plaid indigo bags.
pale tomato bags contain 2 striped silver bags, 1 mirrored aqua bag.
pale salmon bags contain 4 muted indigo bags, 4 faded teal bags.
dark maroon bags contain 5 dotted orange bags, 5 faded beige bags, 3 wavy salmon bags, 5 dim lavender bags.
faded green bags contain 3 wavy coral bags, 5 dull indigo bags, 4 dim salmon bags, 1 pale gray bag.
bright gold bags contain 4 drab lavender bags.
dull white bags contain 4 clear salmon bags, 2 shiny gold bags.
drab olive bags contain 3 pale lime bags, 3 striped crimson bags, 5 plaid gray bags, 2 posh magenta bags.
bright cyan bags contain 4 dotted black bags.
drab beige bags contain 4 shiny yellow bags.
dotted salmon bags contain 5 light maroon bags, 5 dotted gray bags.
posh gray bags contain 3 dark red bags, 2 mirrored gray bags, 2 dim brown bags, 4 dotted aqua bags.
dull gray bags contain 2 shiny beige bags, 5 posh silver bags.
light blue bags contain 1 dim coral bag, 5 vibrant plum bags, 1 clear salmon bag, 1 clear yellow bag.
striped gray bags contain 5 striped indigo bags, 1 faded lime bag, 2 light tomato bags.
dark violet bags contain 1 posh gray bag, 5 shiny cyan bags, 2 pale indigo bags, 4 light coral bags.
striped black bags contain 5 dotted maroon bags, 1 drab blue bag.
shiny coral bags contain 1 clear yellow bag, 5 striped plum bags, 4 dull tomato bags.
faded tan bags contain 5 vibrant bronze bags, 5 muted fuchsia bags, 1 pale coral bag, 4 dull indigo bags.
pale white bags contain 4 clear cyan bags, 2 bright yellow bags, 4 vibrant tomato bags.
plaid plum bags contain 5 pale violet bags, 3 posh yellow bags, 3 faded silver bags.
bright fuchsia bags contain 5 clear black bags.
dotted red bags contain 3 dark magenta bags, 5 clear indigo bags, 1 faded bronze bag, 4 dotted gray bags.
plaid turquoise bags contain 2 dark indigo bags.
pale lavender bags contain 4 posh fuchsia bags, 1 clear black bag, 4 wavy lime bags.
bright lavender bags contain 2 wavy magenta bags, 5 plaid blue bags, 1 drab yellow bag, 1 muted gray bag.
bright white bags contain 4 light gray bags.
dull black bags contain 2 shiny lime bags, 3 muted indigo bags, 5 faded beige bags.
muted tomato bags contain 2 dark yellow bags.
plaid fuchsia bags contain 2 dull lavender bags.
dark indigo bags contain 2 dim lavender bags, 3 shiny maroon bags.
mirrored magenta bags contain 1 mirrored chartreuse bag.
vibrant violet bags contain 5 dotted beige bags, 5 plaid olive bags.
pale lime bags contain 1 vibrant silver bag, 4 shiny white bags, 2 wavy orange bags, 3 plaid coral bags.
mirrored aqua bags contain 5 light yellow bags, 3 plaid silver bags, 2 dark white bags, 2 dull teal bags.
striped turquoise bags contain 1 bright turquoise bag, 2 faded beige bags.
faded indigo bags contain 2 dotted purple bags.
plaid green bags contain 3 dim orange bags.
dotted lavender bags contain 5 dotted crimson bags, 5 bright turquoise bags, 3 muted lavender bags, 4 mirrored olive bags.
muted tan bags contain 2 faded orange bags, 5 mirrored gray bags, 1 faded green bag.
dark plum bags contain 2 mirrored olive bags, 4 muted fuchsia bags, 2 shiny maroon bags, 1 dim fuchsia bag.
light cyan bags contain 4 dotted gray bags, 4 wavy red bags, 1 dull white bag.
striped gold bags contain 2 wavy silver bags, 2 muted purple bags, 3 wavy coral bags.
striped white bags contain 4 wavy coral bags, 4 pale plum bags, 2 wavy black bags, 5 dim olive bags.
mirrored yellow bags contain 3 plaid chartreuse bags, 4 muted gold bags, 1 mirrored bronze bag.
clear tomato bags contain 3 striped indigo bags, 3 dim fuchsia bags, 2 wavy gray bags.
faded teal bags contain no other bags.
faded lavender bags contain 2 clear bronze bags, 3 muted teal bags, 2 dotted yellow bags, 5 shiny purple bags.
posh lavender bags contain 5 posh gray bags.
bright brown bags contain 2 dull crimson bags, 5 muted bronze bags, 4 dark indigo bags, 5 mirrored orange bags.
faded crimson bags contain 3 dotted crimson bags.
mirrored teal bags contain 1 plaid blue bag, 1 clear red bag, 5 striped turquoise bags, 4 dotted beige bags.
dark fuchsia bags contain 1 faded green bag.
dim coral bags contain 5 clear salmon bags, 4 dotted beige bags, 1 pale salmon bag, 2 plaid chartreuse bags.
posh blue bags contain 3 pale maroon bags, 5 dim coral bags.
light indigo bags contain 1 vibrant silver bag, 1 bright chartreuse bag, 1 light black bag.
shiny lavender bags contain 4 dotted olive bags, 5 faded brown bags, 1 plaid tomato bag.
dotted white bags contain 4 dim olive bags.
dotted chartreuse bags contain 4 striped turquoise bags, 1 dotted silver bag.
faded black bags contain 2 muted white bags, 3 drab teal bags, 3 wavy gray bags.
vibrant white bags contain 4 dark white bags, 4 clear violet bags, 3 plaid magenta bags, 5 dark green bags.
faded magenta bags contain 3 faded green bags, 4 plaid olive bags, 5 plaid brown bags, 1 wavy salmon bag.
dull plum bags contain 3 muted purple bags.
dim indigo bags contain 5 dotted fuchsia bags, 5 drab red bags, 1 dull green bag, 5 dim fuchsia bags.
pale yellow bags contain 4 mirrored bronze bags.
light violet bags contain 5 dull black bags.
posh green bags contain 1 plaid plum bag, 3 pale violet bags, 5 muted salmon bags.
mirrored purple bags contain 3 mirrored aqua bags, 1 plaid blue bag.
clear orange bags contain 3 light beige bags.
striped tomato bags contain 4 dark orange bags, 1 bright aqua bag.
dark gray bags contain 1 posh violet bag.
plaid beige bags contain 5 pale beige bags.
plaid gray bags contain 3 mirrored bronze bags, 3 clear green bags, 5 dark chartreuse bags.
mirrored coral bags contain 1 pale tan bag, 2 plaid coral bags, 5 striped bronze bags.
dull silver bags contain 1 vibrant purple bag, 3 drab lavender bags, 2 mirrored salmon bags.
clear yellow bags contain 1 shiny gold bag, 4 dotted beige bags, 4 dark lime bags.
light gold bags contain 3 shiny white bags, 4 dim violet bags, 1 light olive bag.
drab white bags contain 5 shiny lavender bags, 4 dotted lavender bags.
faded yellow bags contain 2 dull crimson bags, 3 muted indigo bags, 2 plaid crimson bags, 3 clear green bags.
light gray bags contain 2 plaid orange bags, 5 plaid lavender bags.
dim bronze bags contain 1 vibrant coral bag, 1 wavy teal bag, 1 pale crimson bag.
shiny gray bags contain 5 light lavender bags, 3 drab red bags, 1 plaid chartreuse bag.
striped beige bags contain 3 light black bags, 1 dull teal bag.
dotted fuchsia bags contain 3 faded indigo bags, 2 dim gray bags.
plaid yellow bags contain 4 pale maroon bags, 5 dull black bags, 1 plaid chartreuse bag, 3 drab orange bags.
muted orange bags contain 3 muted lavender bags.
muted crimson bags contain 4 muted cyan bags, 1 dull plum bag.
muted red bags contain 5 faded turquoise bags, 5 light silver bags, 5 dotted aqua bags.
vibrant chartreuse bags contain 4 wavy violet bags, 1 plaid beige bag, 2 clear cyan bags, 2 dull lavender bags.
pale fuchsia bags contain 3 plaid blue bags, 3 muted bronze bags, 4 faded blue bags.
dotted tomato bags contain 4 dark tomato bags, 3 plaid orange bags, 5 posh teal bags.
dim green bags contain 1 dull white bag.
dim aqua bags contain 2 light silver bags, 3 faded silver bags, 3 dotted orange bags, 4 vibrant salmon bags.
dim brown bags contain no other bags.
muted chartreuse bags contain 2 dark coral bags, 5 striped plum bags.
drab indigo bags contain 2 posh brown bags.
dark orange bags contain 4 plaid blue bags, 1 dark brown bag, 2 striped indigo bags, 1 dark magenta bag.
bright yellow bags contain 3 clear tomato bags.
clear bronze bags contain 4 wavy salmon bags.
dotted olive bags contain 4 striped beige bags, 3 drab orange bags, 3 bright teal bags.
dull violet bags contain 4 plaid salmon bags, 5 faded olive bags.
clear white bags contain 2 plaid coral bags, 1 muted indigo bag, 1 striped beige bag.
dull tan bags contain 5 dim red bags, 5 posh gold bags, 2 clear red bags.
mirrored plum bags contain 4 dim beige bags.
wavy purple bags contain 2 posh silver bags, 5 shiny tan bags, 3 pale red bags, 3 dull salmon bags.
dim black bags contain 3 light yellow bags.
dotted coral bags contain 3 pale violet bags.
posh bronze bags contain 1 posh tomato bag, 1 drab purple bag, 3 dim fuchsia bags, 2 bright brown bags.
wavy salmon bags contain no other bags.
dull blue bags contain 5 dark plum bags, 4 light yellow bags.
faded lime bags contain 2 dim red bags, 3 drab lavender bags, 5 muted black bags, 2 light coral bags.
vibrant coral bags contain 4 muted purple bags, 5 pale chartreuse bags, 5 dotted black bags.
mirrored chartreuse bags contain 5 muted olive bags.
dark lime bags contain 1 dark magenta bag.
light coral bags contain 2 dull lavender bags.
bright lime bags contain 2 wavy bronze bags.
mirrored orange bags contain 1 pale salmon bag, 1 light orange bag.
muted brown bags contain 3 clear beige bags, 1 faded salmon bag, 2 vibrant cyan bags, 4 clear white bags.
posh orange bags contain 2 dark lime bags, 3 wavy purple bags.
posh magenta bags contain 2 dark teal bags.
drab salmon bags contain 5 drab tomato bags.
muted fuchsia bags contain no other bags.
wavy tomato bags contain 4 wavy black bags, 4 faded teal bags.
dim chartreuse bags contain 5 drab green bags, 4 drab magenta bags.
dotted crimson bags contain 2 dark white bags, 5 wavy black bags, 4 dull crimson bags.
posh maroon bags contain 4 plaid silver bags, 4 vibrant lime bags, 4 posh gray bags, 3 dull maroon bags.
dull green bags contain 5 muted tan bags, 5 drab red bags.
clear maroon bags contain 3 faded brown bags.
striped yellow bags contain 4 faded lavender bags, 1 wavy coral bag, 5 clear maroon bags.
dull tomato bags contain 2 shiny white bags, 2 light silver bags, 4 dotted chartreuse bags, 4 dark brown bags.
drab chartreuse bags contain 3 dotted beige bags, 3 pale chartreuse bags, 2 muted fuchsia bags, 5 light crimson bags.
plaid purple bags contain 3 drab yellow bags.
light plum bags contain 1 dotted aqua bag, 2 dark white bags.
mirrored brown bags contain 3 mirrored teal bags, 2 dull cyan bags.
mirrored crimson bags contain 3 dull chartreuse bags, 2 dark silver bags, 5 bright cyan bags, 4 dark tomato bags.
dull gold bags contain 4 muted salmon bags.
wavy olive bags contain 3 mirrored brown bags, 5 clear indigo bags.
faded turquoise bags contain 2 clear salmon bags, 2 mirrored gray bags, 1 dark lime bag.
bright indigo bags contain 2 faded lavender bags, 1 shiny gray bag, 4 mirrored indigo bags.
pale teal bags contain 3 dark violet bags, 5 shiny salmon bags.
plaid orange bags contain 5 faded green bags, 5 pale magenta bags.
shiny crimson bags contain 5 shiny green bags, 1 bright tomato bag, 3 vibrant lime bags, 3 clear purple bags.
muted indigo bags contain 4 dim brown bags, 1 dotted beige bag.
dark cyan bags contain 2 striped yellow bags.
dull teal bags contain 1 muted indigo bag, 2 drab chartreuse bags, 5 faded beige bags.
striped fuchsia bags contain 1 mirrored teal bag, 3 dull black bags, 2 dim salmon bags, 5 wavy salmon bags.
drab crimson bags contain 5 dim teal bags, 2 wavy red bags, 3 dark brown bags.
dull olive bags contain 1 clear yellow bag, 4 plaid indigo bags, 4 posh tomato bags, 1 dotted orange bag.
muted lime bags contain 2 light white bags, 5 dotted violet bags, 5 posh gold bags, 2 bright cyan bags.
dark purple bags contain 1 light lavender bag, 2 plaid olive bags, 5 striped maroon bags, 1 dotted gold bag.
dull yellow bags contain 5 mirrored beige bags.
dotted maroon bags contain 3 clear salmon bags, 1 light salmon bag.
dull beige bags contain 5 shiny fuchsia bags.
clear green bags contain 4 muted lavender bags, 5 faded orange bags, 4 faded silver bags, 4 clear red bags.
striped magenta bags contain 2 dotted plum bags.
posh beige bags contain 5 vibrant maroon bags, 1 dim lavender bag.
striped blue bags contain 3 clear turquoise bags, 3 dark purple bags, 3 shiny yellow bags, 5 clear teal bags.
muted magenta bags contain 3 striped orange bags, 5 dim brown bags.
vibrant orange bags contain 1 bright teal bag, 1 drab salmon bag, 5 dull silver bags.
pale violet bags contain 4 shiny tan bags, 2 clear turquoise bags, 2 pale salmon bags, 2 dotted aqua bags.
dotted aqua bags contain 2 striped turquoise bags, 1 dim fuchsia bag, 2 pale chartreuse bags, 2 bright turquoise bags.
clear black bags contain 4 dotted beige bags, 1 dull brown bag, 2 dull teal bags.
light tan bags contain 3 dotted red bags, 1 dark red bag.
pale green bags contain 4 dull salmon bags, 4 dim brown bags.
dim tan bags contain 2 posh silver bags, 2 dark fuchsia bags.
plaid coral bags contain 2 vibrant plum bags, 5 vibrant red bags, 3 dim salmon bags.
wavy lavender bags contain 2 dark gold bags, 5 plaid blue bags, 1 dim yellow bag.
dim violet bags contain 2 clear tan bags, 5 pale magenta bags.
dotted black bags contain 4 dark magenta bags.
mirrored salmon bags contain 3 vibrant beige bags, 3 vibrant purple bags.
dark green bags contain 4 dotted yellow bags, 1 faded green bag, 3 muted lavender bags.
faded blue bags contain 4 clear turquoise bags, 1 posh indigo bag, 2 faded green bags.
pale black bags contain 2 pale coral bags, 3 faded black bags, 3 mirrored teal bags, 4 muted chartreuse bags.
plaid black bags contain 3 posh brown bags, 3 dark maroon bags, 1 mirrored black bag.
dim olive bags contain 5 posh indigo bags.
dark lavender bags contain 3 light gold bags, 5 dim purple bags.
shiny turquoise bags contain 3 dim fuchsia bags, 4 faded silver bags, 4 dim salmon bags.
light green bags contain 1 drab red bag.
wavy plum bags contain 2 wavy gold bags, 5 bright tan bags.
vibrant tan bags contain 3 drab gray bags.
shiny orange bags contain 2 clear plum bags, 1 posh red bag.
dull lime bags contain 3 pale silver bags.
shiny cyan bags contain 3 shiny purple bags.
posh brown bags contain 1 striped salmon bag, 2 dotted beige bags.
mirrored blue bags contain 2 muted olive bags, 5 mirrored aqua bags.
dark red bags contain 2 shiny purple bags, 4 dim salmon bags, 2 wavy salmon bags.
wavy gray bags contain 4 striped fuchsia bags, 2 wavy salmon bags, 4 faded silver bags.
clear gold bags contain 2 vibrant plum bags.
dark silver bags contain 4 striped gold bags, 4 plaid teal bags, 1 pale yellow bag.
dim cyan bags contain 4 mirrored blue bags, 1 vibrant red bag, 5 shiny indigo bags, 5 muted gray bags.
bright chartreuse bags contain 4 light yellow bags, 3 faded lavender bags.
dotted green bags contain 3 pale indigo bags, 3 drab gray bags, 2 dark white bags, 4 light yellow bags.
vibrant bronze bags contain 5 light white bags, 1 dim lime bag, 5 dim brown bags, 5 plaid coral bags.
muted purple bags contain 3 dark maroon bags.
bright salmon bags contain 3 clear beige bags.
mirrored lime bags contain 1 wavy coral bag, 1 mirrored gray bag.
faded cyan bags contain 2 pale bronze bags, 3 vibrant plum bags.
dull aqua bags contain 2 dark coral bags, 3 clear turquoise bags.
posh aqua bags contain 1 pale teal bag, 2 dim coral bags.
wavy aqua bags contain 2 posh indigo bags, 4 shiny cyan bags, 3 muted tan bags.
dark magenta bags contain 1 pale red bag, 1 dull brown bag, 3 faded lavender bags.
striped lavender bags contain 4 striped gold bags, 3 mirrored olive bags, 2 dim lime bags, 1 muted indigo bag.
bright turquoise bags contain no other bags.
dim teal bags contain 5 dark white bags, 2 faded chartreuse bags, 1 striped beige bag, 4 muted gold bags.
wavy yellow bags contain 4 pale fuchsia bags.
muted black bags contain 1 striped salmon bag, 1 shiny gold bag, 3 plaid gray bags.
dark beige bags contain 3 wavy gray bags, 5 dim red bags.
mirrored tan bags contain 2 faded purple bags, 4 faded lime bags, 5 dull lavender bags, 4 dark plum bags.
vibrant teal bags contain 1 dark teal bag, 4 dotted chartreuse bags.
bright plum bags contain 1 vibrant silver bag.
dotted purple bags contain 3 faded beige bags, 3 muted lavender bags.
faded tomato bags contain 1 muted olive bag, 5 faded orange bags, 5 light yellow bags.
light crimson bags contain no other bags.
drab fuchsia bags contain 2 vibrant silver bags, 1 dim fuchsia bag, 3 clear plum bags, 1 drab gold bag.
muted blue bags contain 1 dotted silver bag, 5 dull beige bags, 3 posh silver bags.
dark brown bags contain 1 clear red bag, 2 light yellow bags, 1 wavy gold bag, 2 plaid olive bags.
dim gold bags contain 4 dotted purple bags, 3 plaid blue bags.
dim crimson bags contain 5 muted magenta bags.
shiny teal bags contain 1 dotted bronze bag, 4 vibrant teal bags, 4 pale blue bags.
drab blue bags contain 3 dark salmon bags.
bright olive bags contain 5 pale fuchsia bags.
mirrored gold bags contain 2 posh brown bags, 2 bright purple bags, 5 shiny cyan bags.
dim turquoise bags contain 4 pale cyan bags, 2 mirrored violet bags.
clear silver bags contain 4 dark plum bags, 4 pale gray bags, 5 mirrored bronze bags.
clear olive bags contain 4 muted green bags.
drab lime bags contain 3 dotted aqua bags, 2 faded blue bags, 3 faded salmon bags, 3 dim yellow bags.
dim fuchsia bags contain no other bags.
mirrored black bags contain 1 dark white bag.
clear cyan bags contain 3 plaid chartreuse bags, 3 plaid teal bags, 5 dark gold bags, 5 dim lime bags.
bright tomato bags contain 4 dark green bags.
dim white bags contain 2 shiny yellow bags, 1 pale maroon bag.
light turquoise bags contain 5 posh blue bags, 2 light fuchsia bags.
shiny olive bags contain 5 vibrant white bags, 3 dark salmon bags, 5 dotted tan bags.
striped maroon bags contain 1 mirrored olive bag.
striped salmon bags contain 3 muted indigo bags, 5 wavy salmon bags, 4 shiny maroon bags, 4 dim fuchsia bags.
striped orange bags contain 2 dotted purple bags, 4 shiny cyan bags, 1 drab gold bag, 4 dark beige bags.
posh olive bags contain 3 faded tomato bags, 5 posh blue bags, 1 clear red bag.
shiny plum bags contain 3 pale purple bags, 3 dim beige bags.
dark olive bags contain 4 dull coral bags.
dotted teal bags contain 5 plaid lavender bags, 4 clear bronze bags, 4 dim lime bags, 3 pale maroon bags.
clear brown bags contain 2 wavy teal bags, 1 faded green bag, 5 light white bags.
clear crimson bags contain 4 pale turquoise bags, 5 plaid green bags, 3 shiny aqua bags, 5 wavy turquoise bags.
mirrored maroon bags contain 5 bright coral bags, 5 drab orange bags.
wavy violet bags contain 4 mirrored tomato bags, 4 striped gold bags.
plaid olive bags contain 3 dotted silver bags.
light purple bags contain 2 dark red bags, 5 dull cyan bags, 4 plaid black bags.
wavy orange bags contain 1 dim green bag, 4 dark coral bags.
vibrant red bags contain 4 posh brown bags.
wavy silver bags contain 5 faded orange bags, 2 wavy coral bags, 4 faded silver bags.
dark tan bags contain 3 mirrored brown bags, 2 bright plum bags, 2 plaid silver bags.
vibrant blue bags contain 1 wavy salmon bag, 5 pale green bags.
shiny bronze bags contain 5 wavy white bags, 1 dim indigo bag, 5 muted crimson bags, 5 shiny lime bags.
clear red bags contain 1 dotted aqua bag, 3 pale chartreuse bags, 2 muted teal bags, 5 posh brown bags.
dotted silver bags contain 2 dark maroon bags, 3 dim brown bags.
bright tan bags contain 1 posh black bag, 5 striped orange bags, 5 drab gold bags.
drab red bags contain 5 posh gray bags.
striped purple bags contain 1 striped silver bag, 1 pale blue bag, 4 mirrored black bags.
striped bronze bags contain 2 striped gold bags, 5 light crimson bags, 5 faded tomato bags, 3 wavy indigo bags.
pale red bags contain 2 mirrored olive bags, 5 faded orange bags, 4 faded chartreuse bags, 2 plaid chartreuse bags.
dim plum bags contain 4 vibrant coral bags, 3 clear purple bags, 3 dull blue bags.
muted yellow bags contain 2 clear red bags, 3 pale plum bags.
posh salmon bags contain 3 pale tan bags, 3 wavy gold bags.
mirrored bronze bags contain 4 faded bronze bags, 1 clear black bag, 5 dark white bags.
muted cyan bags contain 2 dim plum bags.
vibrant fuchsia bags contain 1 faded teal bag, 2 muted teal bags, 3 pale chartreuse bags, 3 bright teal bags.
mirrored fuchsia bags contain 4 dull red bags, 1 light cyan bag, 3 wavy crimson bags, 3 wavy yellow bags.
clear indigo bags contain 5 clear bronze bags, 4 dark coral bags, 4 drab chartreuse bags.
pale bronze bags contain 2 faded salmon bags, 1 shiny black bag, 3 pale yellow bags, 3 dotted chartreuse bags.
pale purple bags contain 4 mirrored black bags, 1 vibrant silver bag, 2 striped beige bags, 5 dotted chartreuse bags.
muted gray bags contain 4 shiny purple bags, 4 light green bags, 1 pale fuchsia bag.
clear blue bags contain 5 dotted olive bags, 4 light purple bags.
posh cyan bags contain 5 muted tan bags, 1 dotted cyan bag, 4 wavy gold bags.
bright purple bags contain 4 wavy salmon bags, 1 dark teal bag, 4 pale yellow bags.
drab aqua bags contain 1 vibrant red bag.
pale silver bags contain 4 light lavender bags, 2 mirrored bronze bags, 1 striped teal bag.
dark blue bags contain 3 dull beige bags, 4 faded salmon bags, 1 dull black bag, 5 posh salmon bags.
plaid tan bags contain 1 plaid lavender bag, 5 pale lavender bags, 4 light aqua bags.
posh tan bags contain 3 dotted lime bags.
drab maroon bags contain 5 mirrored chartreuse bags.
dim magenta bags contain 1 pale fuchsia bag, 2 light fuchsia bags, 5 bright bronze bags, 1 faded gray bag.
shiny purple bags contain 2 pale chartreuse bags.
drab turquoise bags contain 4 light turquoise bags.
light bronze bags contain 2 posh black bags, 3 dark yellow bags, 3 faded plum bags.
plaid gold bags contain 4 dark teal bags, 4 shiny plum bags.
dim maroon bags contain 2 clear plum bags, 3 striped aqua bags, 2 striped teal bags.
drab coral bags contain 3 faded chartreuse bags, 2 drab plum bags, 3 faded red bags, 1 dark blue bag.
faded gray bags contain 3 pale gray bags, 2 dull beige bags, 5 wavy indigo bags.
dotted magenta bags contain 2 light salmon bags.
light magenta bags contain 3 posh yellow bags, 3 dotted green bags, 1 drab violet bag.
dotted cyan bags contain 2 faded plum bags.
dim orange bags contain 5 light brown bags, 5 bright yellow bags.
posh teal bags contain 1 faded beige bag, 5 mirrored gold bags, 5 bright teal bags.
dim purple bags contain 2 light silver bags, 5 muted red bags, 1 mirrored gold bag, 2 posh orange bags.
shiny tomato bags contain 3 striped coral bags, 3 dark plum bags, 5 plaid turquoise bags.
vibrant olive bags contain 3 vibrant lime bags, 5 mirrored white bags, 1 pale bronze bag, 2 striped cyan bags.
dull lavender bags contain 5 muted gold bags, 5 pale maroon bags.
light black bags contain 1 dark plum bag, 1 shiny gold bag.
bright magenta bags contain 3 striped turquoise bags, 3 dim gray bags.
drab tomato bags contain 3 vibrant purple bags, 4 shiny purple bags, 2 light maroon bags.
posh turquoise bags contain 2 bright aqua bags, 2 striped salmon bags, 5 muted green bags.
dotted yellow bags contain 3 dark red bags, 3 wavy gold bags.
plaid lavender bags contain 4 striped turquoise bags, 1 dotted olive bag, 1 clear green bag, 4 shiny beige bags.
drab black bags contain 5 dotted magenta bags, 2 drab yellow bags, 2 striped turquoise bags, 1 dark bronze bag.
clear beige bags contain 4 striped salmon bags.
light lavender bags contain 1 wavy silver bag, 1 dark indigo bag.
posh red bags contain 4 muted olive bags, 3 light tan bags, 4 clear gray bags, 2 dim lime bags.
clear coral bags contain 3 light lime bags, 2 posh violet bags.
plaid salmon bags contain 2 pale yellow bags, 5 dark plum bags.
pale gold bags contain 2 striped teal bags, 3 faded crimson bags.
wavy red bags contain 4 faded green bags, 5 dim coral bags, 4 wavy silver bags, 4 plaid brown bags.
faded white bags contain 2 posh tomato bags, 1 posh green bag, 4 vibrant lavender bags.
dull indigo bags contain 3 muted olive bags, 4 shiny purple bags, 3 drab chartreuse bags, 1 dotted orange bag.
wavy green bags contain 3 pale indigo bags, 1 striped purple bag, 5 dotted coral bags, 1 shiny tan bag.
shiny red bags contain 4 pale fuchsia bags, 2 posh salmon bags.
vibrant cyan bags contain 1 faded salmon bag, 1 faded black bag, 4 striped coral bags.
dark tomato bags contain 3 clear maroon bags, 4 plaid maroon bags, 5 dotted aqua bags.
vibrant gold bags contain 1 shiny fuchsia bag.
dark black bags contain 2 wavy lime bags, 1 pale cyan bag, 4 posh brown bags.
posh fuchsia bags contain 4 pale purple bags, 2 dull lavender bags.
light silver bags contain 2 vibrant plum bags, 2 pale magenta bags, 4 pale chartreuse bags, 3 plaid chartreuse bags.
dark yellow bags contain 1 dotted crimson bag, 3 faded orange bags, 5 posh teal bags, 1 clear plum bag.
mirrored turquoise bags contain 2 muted teal bags.
drab purple bags contain 5 dotted plum bags, 1 plaid plum bag.
dotted tan bags contain 1 pale plum bag, 1 dotted aqua bag.
drab bronze bags contain 4 vibrant red bags, 4 light blue bags.
mirrored cyan bags contain 1 dark white bag, 4 dark lime bags, 5 vibrant silver bags.
shiny aqua bags contain 5 wavy plum bags, 4 drab maroon bags, 2 drab chartreuse bags.
striped aqua bags contain 1 plaid blue bag, 1 dark plum bag, 4 faded lavender bags.
dotted plum bags contain 5 mirrored green bags, 1 dark plum bag, 4 dark maroon bags.
faded gold bags contain 4 pale yellow bags.
vibrant beige bags contain 2 light lavender bags, 3 faded indigo bags.
light brown bags contain 3 drab brown bags, 4 dark violet bags, 3 faded indigo bags.';

// $source = 'shiny gold bags contain 2 dark red bags.
// dark red bags contain 2 dark orange bags.
// dark orange bags contain 2 dark yellow bags.
// dark yellow bags contain 2 dark green bags.
// dark green bags contain 2 dark blue bags.
// dark blue bags contain 2 dark violet bags.
// dark violet bags contain no other bags.';

// $source = 'light red bags contain 1 bright white bag, 2 muted yellow bags.
// dark orange bags contain 3 bright white bags, 4 muted yellow bags.
// bright white bags contain 1 shiny gold bag.
// muted yellow bags contain 2 shiny gold bags, 9 faded blue bags.
// shiny gold bags contain 1 dark olive bag, 2 vibrant plum bags.
// dark olive bags contain 3 faded blue bags, 4 dotted black bags.
// vibrant plum bags contain 5 faded blue bags, 6 dotted black bags.
// faded blue bags contain no other bags.
// dotted black bags contain no other bags.';

$rows = array_values(array_filter(explode("\n", $source)));
$groups = [];
$cnt = 0;
foreach ($rows as $row) {
	$tmp = explode('contain', $row);
	$color_bags = array_shift($tmp);

	$bag = Bag::getBagFromString($color_bags);
	$subbags = Bag::getSubBags($tmp[0]);

	$bag->contains = $subbags;
	Bag::addBagtoCollection($bag);
}

$shiny = Bag::findBagByColorAndAttribute('shiny', 'gold');
$bagnumber = $shiny->getTotalNestedBagNumber();

var_dump($bagnumber);

class Bag
{
	public string $color;
	public string $attribute;
	/** @var Contains[] */
	public array $contains = [];
	/** @var Bag[] */
	public static array $collection = [];

	public function __construct($attribute, $color, $contains = [])
	{
		$this->color = $color;
		$this->attribute = $attribute;
		$this->contains = $contains;
	}

	public function getId(): string
	{
		return md5($this->color . $this->attribute);
	}

	public static function getBagFromString($string): ?Bag
	{
		if (!preg_match('/(\w+) (\w+) (bag|bags)/', $string, $result)) {
			return null;
		}

		[$original, $attribute, $color] = $result;
		$bag = new Bag($attribute, $color, []);

		return self::getBagFromCollection($bag->getId()) ?? $bag;
	}

	public static function getSubBags(string $string): array
	{
		$bags = [];
		$tmp = explode(',', $string);
		foreach ($tmp as $color_string) {
			$color_string = trim($color_string);
			if ($color_string === 'no other bags.') {
				continue;
			}

			if (preg_match('/(\d+) ((\w+) (\w+) (bag|bags))/', $color_string, $match)) {
				$bag = self::getBagFromString($match[2]);
				if ($bag) {
					$bags[] = new Contains((int) $match[1], $bag);
				}
			}
		}

		return $bags;
	}

	public static function getBagFromCollection(string $id): ?Bag
	{
		return self::$collection[$id] ?? null;
	}

	public static function addBagtoCollection(Bag $bag): void
	{
		if (isset(self::$collection[$bag->getId()])) {
			trigger_error('Element bereits vorhanden!');
		}
		self::$collection[$bag->getId()] = $bag;
	}

	public static function findBagByColorAndAttribute(string $attribute, string $color): ?Bag
	{
		return self::getBagFromCollection(md5($color . $attribute));
	}

	/** @return Bag[] */
	public function getParents(): array
	{
		$id = $this->getId();
		$parents = [];
		foreach (self::$collection as $bag) {
			foreach ($bag->contains as $contain) {
				if ($contain->bag->getId() === $id) {
					$parents[$bag->getId()] = $bag;
				}
			}
		}

		return $parents;
	}

	public function getParentsAll(): array
	{
		$result = $this->getParents();
		if (empty($result)) {
			return [];
		}
		$mr = [$result];
		foreach ($result as $parent) {
			$mr[] = $parent->getParentsAll();
		}

		$mr = array_merge([], ...$mr);

		return $mr;
	}

	/** @return Contains[] */
	public function getChildren(): array
	{
		return $this->contains;
	}

	public function getTotalNestedBagNumber(): int
	{
		$result = 0;
		foreach ($this->getChildren() as $child) {
			$realBag = self::getBagFromCollection($child->bag->getId());
			$total = $realBag->getTotalNestedBagNumber();
			if ($total > 0) {
				$result += $child->count * $total;
			}
			$result += $child->count;
		}

		return $result;
	}
}

class Contains
{
	public int $count;
	public Bag $bag;

	public function __construct($count, $bag)
	{
		$this->count = $count;
		$this->bag = $bag;
	}
}
