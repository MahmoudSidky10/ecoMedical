var KTTagifyDemos = {
    init: function () {
        var e, a, i;
        e = document.getElementById("kt_tagify_1"), a = new Tagify(e, {
            whitelist: listOfCurrencies,
            blacklist: []
        }), document.getElementById("kt_tagify_1_remove").addEventListener("click", a.removeAllTags.bind(a)), a.on("add", (function i(t) {
            console.log("onAddTag: ", t.detail), console.log("original input value: ", e.value), a.off("add", i)
        })).on("remove", (function (e) {
            console.log(e.detail), console.log("tagify instance value:", a.value)
        })).on("input", (function (e) {
            console.log(e.detail), console.log("onInput: ", e.detail)
        })).on("edit", (function (e) {
            console.log("onTagEdit: ", e.detail)
        })).on("invalid", (function (e) {
            console.log("onInvalidTag: ", e.detail)
        })).on("click", (function (e) {
            console.log(e.detail), console.log("onTagClick: ", e.detail)
        })).on("dropdown:show", (function (e) {
            console.log("onDropdownShow: ", e.detail)
        })).on("dropdown:hide", (function (e) {
            console.log("onDropdownHide: ", e.detail)
        })), function () {
            var e = document.getElementById("kt_tagify_1_1");
            new Tagify(e).addTags([{value: "laravel", color: "yellow", readonly: !0}])
        }(), function () {
            var e = document.getElementById("kt_tagify_2");
            new Tagify(e, {
                enforceWhitelist: !0,
                whitelist: ["The Shawshank Redemption", "The Godfather", "The Godfather: Part II", "The Dark Knight", "12 Angry Men", "Schindler's List", "Pulp Fiction", "The Lord of the Rings: The Return of the King", "The Good, the Bad and the Ugly", "Fight Club", "The Lord of the Rings: The Fellowship of the Ring", "Star Wars: Episode V - The Empire Strikes Back", "Forrest Gump", "Inception", "The Lord of the Rings: The Two Towers", "One Flew Over the Cuckoo's Nest", "Goodfellas", "The Matrix", "Seven Samurai", "Star Wars: Episode IV - A New Hope", "City of God", "Se7en", "The Silence of the Lambs", "It's a Wonderful Life", "The Usual Suspects", "Life Is Beautiful", "Léon: The Professional", "Spirited Away", "Saving Private Ryan", "La La Land", "Once Upon a Time in the West", "American History X", "Interstellar", "Casablanca", "Psycho", "City Lights", "The Green Mile", "Raiders of the Lost Ark", "The Intouchables", "Modern Times", "Rear Window", "The Pianist", "The Departed", "Terminator 2: Judgment Day", "Back to the Future", "Whiplash", "Gladiator", "Memento", "Apocalypse Now", "The Prestige", "The Lion King", "Alien", "Dr. Strangelove or: How I Learned to Stop Worrying and Love the Bomb", "Sunset Boulevard", "The Great Dictator", "Cinema Paradiso", "The Lives of Others", "Paths of Glory", "Grave of the Fireflies", "Django Unchained", "The Shining", "WALL·E", "American Beauty", "The Dark Knight Rises", "Princess Mononoke", "Aliens", "Oldboy", "Once Upon a Time in America", "Citizen Kane", "Das Boot", "Witness for the Prosecution", "North by Northwest", "Vertigo", "Star Wars: Episode VI - Return of the Jedi", "Reservoir Dogs", "M", "Braveheart", "Amélie", "Requiem for a Dream", "A Clockwork Orange", "Taxi Driver", "Lawrence of Arabia", "Like Stars on Earth", "Double Indemnity", "To Kill a Mockingbird", "Eternal Sunshine of the Spotless Mind", "Toy Story 3", "Amadeus", "My Father and My Son", "Full Metal Jacket", "The Sting", "2001: A Space Odyssey", "Singin' in the Rain", "Bicycle Thieves", "Toy Story", "Dangal", "The Kid", "Inglourious Basterds", "Snatch", "Monty Python and the Holy Grail", "Hacksaw Ridge", "3 Idiots", "L.A. Confidential", "For a Few Dollars More", "Scarface", "Rashomon", "The Apartment", "The Hunt", "Good Will Hunting", "Indiana Jones and the Last Crusade", "A Separation", "Metropolis", "Yojimbo", "All About Eve", "Batman Begins", "Up", "Some Like It Hot", "The Treasure of the Sierra Madre", "Unforgiven", "Downfall", "Raging Bull", "The Third Man", "Die Hard", "Children of Heaven", "The Great Escape", "Heat", "Chinatown", "Inside Out", "Pan's Labyrinth", "Ikiru", "My Neighbor Totoro", "On the Waterfront", "Room", "Ran", "The Gold Rush", "The Secret in Their Eyes", "The Bridge on the River Kwai", "Blade Runner", "Mr. Smith Goes to Washington", "The Seventh Seal", "Howl's Moving Castle", "Lock, Stock and Two Smoking Barrels", "Judgment at Nuremberg", "Casino", "The Bandit", "Incendies", "A Beautiful Mind", "A Wednesday", "The General", "The Elephant Man", "Wild Strawberries", "Arrival", "V for Vendetta", "Warrior", "The Wolf of Wall Street", "Manchester by the Sea", "Sunrise", "The Passion of Joan of Arc", "Gran Torino", "Rang De Basanti", "Trainspotting", "Dial M for Murder", "The Big Lebowski", "The Deer Hunter", "Tokyo Story", "Gone with the Wind", "Fargo", "Finding Nemo", "The Sixth Sense", "The Thing", "Hera Pheri", "Cool Hand Luke", "Andaz Apna Apna", "Rebecca", "No Country for Old Men", "How to Train Your Dragon", "Munna Bhai M.B.B.S.", "Sholay", "Kill Bill: Vol. 1", "Into the Wild", "Mary and Max", "Gone Girl", "There Will Be Blood", "Come and See", "It Happened One Night", "Life of Brian", "Rush", "Hotel Rwanda", "Platoon", "Shutter Island", "Network", "The Wages of Fear", "Stand by Me", "Wild Tales", "In the Name of the Father", "Spotlight", "Star Wars: The Force Awakens", "The Nights of Cabiria", "The 400 Blows", "Butch Cassidy and the Sundance Kid", "Mad Max: Fury Road", "The Maltese Falcon", "12 Years a Slave", "Ben-Hur", "The Grand Budapest Hotel", "Persona", "Million Dollar Baby", "Amores Perros", "Jurassic Park", "The Princess Bride", "Hachi: A Dog's Tale", "Memories of Murder", "Stalker", "Nausicaä of the Valley of the Wind", "Drishyam", "The Truman Show", "The Grapes of Wrath", "Before Sunrise", "Touch of Evil", "Annie Hall", "The Message", "Rocky", "Gandhi", "Harry Potter and the Deathly Hallows: Part 2", "The Bourne Ultimatum", "Diabolique", "Donnie Darko", "Monsters, Inc.", "Prisoners", "8½", "The Terminator", "The Wizard of Oz", "Catch Me If You Can", "Groundhog Day", "Twelve Monkeys", "Zootopia", "La Haine", "Barry Lyndon", "Jaws", "The Best Years of Our Lives", "Infernal Affairs", "Udaan", "The Battle of Algiers", "Strangers on a Train", "Dog Day Afternoon", "Sin City", "Kind Hearts and Coronets", "Gangs of Wasseypur", "The Help"],
                callbacks: {add: console.log, remove: console.log}
            })
        }(), function () {
            var e = document.getElementById("kt_tagify_3"), a = new Tagify(e);
            a.DOM.input.classList.add("form-control"), a.DOM.input.setAttribute("placeholder", "enter tag..."), a.DOM.scope.parentNode.insertBefore(a.DOM.input, a.DOM.scope)
        }(), function () {
            var e = document.getElementById("kt_tagify_4"), a = new Tagify(e, {
                pattern: /^.{0,20}$/,
                delimiters: ", ",
                maxTags: 6,
                blacklist: ["fuck", "shit", "pussy"],
                keepInvalidTags: !0,
                whitelist: ["temple", "stun", "detective", "sign", "passion", "routine", "deck", "discriminate", "relaxation", "fraud", "attractive", "soft", "forecast", "point", "thank", "stage", "eliminate", "effective", "flood", "passive", "skilled", "separation", "contact", "compromise", "reality", "district", "nationalist", "leg", "porter", "conviction", "worker", "vegetable", "commerce", "conception", "particle", "honor", "stick", "tail", "pumpkin", "core", "mouse", "egg", "population", "unique", "behavior", "onion", "disaster", "cute", "pipe", "sock", "dialect", "horse", "swear", "owner", "cope", "global", "improvement", "artist", "shed", "constant", "bond", "brink", "shower", "spot", "inject", "bowel", "homosexual", "trust", "exclude", "tough", "sickness", "prevalence", "sister", "resolution", "cattle", "cultural", "innocent", "burial", "bundle", "thaw", "respectable", "thirsty", "exposure", "team", "creed", "facade", "calendar", "filter", "utter", "dominate", "predator", "discover", "theorist", "hospitality", "damage", "woman", "rub", "crop", "unpleasant", "halt", "inch", "birthday", "lack", "throne", "maximum", "pause", "digress", "fossil", "policy", "instrument", "trunk", "frame", "measure", "hall", "support", "convenience", "house", "partnership", "inspector", "looting", "ranch", "asset", "rally", "explicit", "leak", "monarch", "ethics", "applied", "aviation", "dentist", "great", "ethnic", "sodium", "truth", "constellation", "lease", "guide", "break", "conclusion", "button", "recording", "horizon", "council", "paradox", "bride", "weigh", "like", "noble", "transition", "accumulation", "arrow", "stitch", "academy", "glimpse", "case", "researcher", "constitutional", "notion", "bathroom", "revolutionary", "soldier", "vehicle", "betray", "gear", "pan", "quarter", "embarrassment", "golf", "shark", "constitution", "club", "college", "duty", "eaux", "know", "collection", "burst", "fun", "animal", "expectation", "persist", "insure", "tick", "account", "initiative", "tourist", "member", "example", "plant", "river", "ratio", "view", "coast", "latest", "invite", "help", "falsify", "allocation", "degree", "feel", "resort", "means", "excuse", "injury", "pupil", "shaft", "allow", "ton", "tube", "dress", "speaker", "double", "theater", "opposed", "holiday", "screw", "cutting", "picture", "laborer", "conservation", "kneel", "miracle", "primary", "nomination", "characteristic", "referral", "carbon", "valley", "hot", "climb", "wrestle", "motorist", "update", "loot", "mosquito", "delivery", "eagle", "guideline", "hurt", "feedback", "finish", "traffic", "competence", "serve", "archive", "feeling", "hope", "seal", "ear", "oven", "vote", "ballot", "study", "negative", "declaration", "particular", "pattern", "suburb", "intervention", "brake", "frequency", "drink", "affair", "contemporary", "prince", "dry", "mole", "lazy", "undermine", "radio", "legislation", "circumstance", "bear", "left", "pony", "industry", "mastermind", "criticism", "sheep", "failure", "chain", "depressed", "launch", "script", "green", "weave", "please", "surprise", "doctor", "revive", "banquet", "belong", "correction", "door", "image", "integrity", "intermediate", "sense", "formal", "cane", "gloom", "toast", "pension", "exception", "prey", "random", "nose", "predict", "needle", "satisfaction", "establish", "fit", "vigorous", "urgency", "X-ray", "equinox", "variety", "proclaim", "conceive", "bulb", "vegetarian", "available", "stake", "publicity", "strikebreaker", "portrait", "sink", "frog", "ruin", "studio", "match", "electron", "captain", "channel", "navy", "set", "recommend", "appoint", "liberal", "missile", "sample", "result", "poor", "efflux", "glance", "timetable", "advertise", "personality", "aunt", "dog"],
                transformTag: function (e) {
                    e.class = "tagify__tag tagify__tag--" + ["success", "primary", "danger", "success", "warning", "dark", "primary", "info"][KTUtil.getRandomInt(0, 7)], "shit" == e.value.toLowerCase() && (e.value = "s✲✲t")
                },
                dropdown: {enabled: 3}
            });
            a.on("add", (function (e) {
                console.log(e.detail)
            })), a.on("invalid", (function (e) {
                console.log(e, e.detail)
            }))
        }(), i = document.getElementById("kt_tagify_5"), new Tagify(i, {
            delimiters: ", ",
            maxTags: 10,
            blacklist: ["fuck", "shit", "pussy"],
            keepInvalidTags: !0,
            whitelist: [{
                value: "Chris Muller",
                email: "chris.muller@wix.com",
                initials: "",
                initialsState: "",
                pic: "./assets/media/users/150-11.jpg",
                class: "tagify__tag--primary"
            }, {
                value: "Nick Bold",
                email: "nick.seo@gmail.com",
                initials: "SS",
                initialsState: "warning",
                pic: ""
            }, {
                value: "Alon Silko",
                email: "alon@keenthemes.com",
                initials: "",
                initialsState: "",
                pic: "./assets/media/users/150-6.jpg"
            }, {
                value: "Sam Seanic",
                email: "sam.senic@loop.com",
                initials: "",
                initialsState: "",
                pic: "./assets/media/users/150-8.jpg"
            }, {
                value: "Sara Loran",
                email: "sara.loran@tilda.com",
                initials: "",
                initialsState: "",
                pic: "./assets/media/users/150-9.jpg"
            }, {
                value: "Eric Davok",
                email: "davok@mix.com",
                initials: "",
                initialsState: "",
                pic: "./assets/media/users/150-13.jpg"
            }, {
                value: "Sam Seanic",
                email: "sam.senic@loop.com",
                initials: "",
                initialsState: "",
                pic: "./assets/media/users/150-13.jpg"
            }, {
                value: "Lina Nilson",
                email: "lina.nilson@loop.com",
                initials: "LN",
                initialsState: "danger",
                pic: "./assets/media/users/150-15.jpg"
            }],
            templates: {
                dropdownItem: function (e) {
                    try {
                        var a = "";
                        return a += '<div class="tagify__dropdown__item">', a += '   <div class="d-flex align-items-center">', a += '       <span class="symbol sumbol-' + (e.initialsState ? e.initialsState : "") + ' mr-2">', a += '           <span class="symbol-label" style="background-image: url(\'' + (e.pic ? e.pic : "") + "')\">" + (e.initials ? e.initials : "") + "</span>", a += "       </span>", a += '       <div class="d-flex flex-column">', a += '           <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">' + (e.value ? e.value : "") + "</a>", a += '           <span class="text-muted font-weight-bold">' + (e.email ? e.email : "") + "</span>", a += "       </div>", a += "   </div>", a += "</div>"
                    } catch (e) {
                    }
                }
            },
            transformTag: function (e) {
                e.class = "tagify__tag tagify__tag--primary"
            },
            dropdown: {classname: "color-blue", enabled: 1, maxItems: 5}
        }), function () {
            var e = document.getElementById("kt_tagify_6"), a = new Tagify(e, {
                pattern: /^.{0,20}$/,
                delimiters: ", ",
                maxTags: 6,
                blacklist: ["fuck", "shit", "pussy"],
                keepInvalidTags: !0,
                whitelist: ["temple", "stun", "detective", "sign", "passion", "routine", "deck", "discriminate", "relaxation", "fraud", "attractive", "soft", "forecast", "point", "thank", "stage", "eliminate", "effective", "flood", "passive", "skilled", "separation", "contact", "compromise", "reality", "district", "nationalist", "leg", "porter", "conviction", "worker", "vegetable", "commerce", "conception", "particle", "honor", "stick", "tail", "pumpkin", "core", "mouse", "egg", "population", "unique", "behavior", "onion", "disaster", "cute", "pipe", "sock", "dialect", "horse", "swear", "owner", "cope", "global", "improvement", "artist", "shed", "constant", "bond", "brink", "shower", "spot", "inject", "bowel", "homosexual", "trust", "exclude", "tough", "sickness", "prevalence", "sister", "resolution", "cattle", "cultural", "innocent", "burial", "bundle", "thaw", "respectable", "thirsty", "exposure", "team", "creed", "facade", "calendar", "filter", "utter", "dominate", "predator", "discover", "theorist", "hospitality", "damage", "woman", "rub", "crop", "unpleasant", "halt", "inch", "birthday", "lack", "throne", "maximum", "pause", "digress", "fossil", "policy", "instrument", "trunk", "frame", "measure", "hall", "support", "convenience", "house", "partnership", "inspector", "looting", "ranch", "asset", "rally", "explicit", "leak", "monarch", "ethics", "applied", "aviation", "dentist", "great", "ethnic", "sodium", "truth", "constellation", "lease", "guide", "break", "conclusion", "button", "recording", "horizon", "council", "paradox", "bride", "weigh", "like", "noble", "transition", "accumulation", "arrow", "stitch", "academy", "glimpse", "case", "researcher", "constitutional", "notion", "bathroom", "revolutionary", "soldier", "vehicle", "betray", "gear", "pan", "quarter", "embarrassment", "golf", "shark", "constitution", "club", "college", "duty", "eaux", "know", "collection", "burst", "fun", "animal", "expectation", "persist", "insure", "tick", "account", "initiative", "tourist", "member", "example", "plant", "river", "ratio", "view", "coast", "latest", "invite", "help", "falsify", "allocation", "degree", "feel", "resort", "means", "excuse", "injury", "pupil", "shaft", "allow", "ton", "tube", "dress", "speaker", "double", "theater", "opposed", "holiday", "screw", "cutting", "picture", "laborer", "conservation", "kneel", "miracle", "primary", "nomination", "characteristic", "referral", "carbon", "valley", "hot", "climb", "wrestle", "motorist", "update", "loot", "mosquito", "delivery", "eagle", "guideline", "hurt", "feedback", "finish", "traffic", "competence", "serve", "archive", "feeling", "hope", "seal", "ear", "oven", "vote", "ballot", "study", "negative", "declaration", "particular", "pattern", "suburb", "intervention", "brake", "frequency", "drink", "affair", "contemporary", "prince", "dry", "mole", "lazy", "undermine", "radio", "legislation", "circumstance", "bear", "left", "pony", "industry", "mastermind", "criticism", "sheep", "failure", "chain", "depressed", "launch", "script", "green", "weave", "please", "surprise", "doctor", "revive", "banquet", "belong", "correction", "door", "image", "integrity", "intermediate", "sense", "formal", "cane", "gloom", "toast", "pension", "exception", "prey", "random", "nose", "predict", "needle", "satisfaction", "establish", "fit", "vigorous", "urgency", "X-ray", "equinox", "variety", "proclaim", "conceive", "bulb", "vegetarian", "available", "stake", "publicity", "strikebreaker", "portrait", "sink", "frog", "ruin", "studio", "match", "electron", "captain", "channel", "navy", "set", "recommend", "appoint", "liberal", "missile", "sample", "result", "poor", "efflux", "glance", "timetable", "advertise", "personality", "aunt", "dog"],
                transformTag: function (e) {
                    e.class = "tagify__tag tagify__tag-light--" + ["success", "primary", "danger", "success", "warning", "dark", "primary", "info"][KTUtil.getRandomInt(0, 7)], "shit" == e.value.toLowerCase() && (e.value = "s✲✲t")
                },
                dropdown: {enabled: 3}
            });
            a.on("add", (function (e) {
                console.log(e.detail)
            })), a.on("invalid", (function (e) {
                console.log(e, e.detail)
            }))
        }()
    }
};
jQuery(document).ready((function () {
    KTTagifyDemos.init()
}));
//# sourceMappingURL=tagify.js.map
