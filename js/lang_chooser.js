
const emojis = ["🐧", "🦆", "🐠", "🍂", "🍄", "🌺", "☃️", "🐝", "👻"]
const emoji_chooser = (arr) => arr[Math.floor(Math.random() * arr.length)]

var MLstrings = [
    {
        中文: "密码",
        ENG: "password",
    },
    {
        中文: "用户名",
        ENG: "username",
    },
    {
        中文: "登录",
        ENG: "login",
    },
    {
        中文: "邮件",
        ENG: "email",
    },
    {
        中文: "注册",
        ENG: "register",
    }
];
var mlCodes = [
  {
    code: "cn",
    name: "中文",
  },
  // More country codes
];
var mlrLangInUse;
var mlr = function({
    dropID = "lang-chooser",
    stringAttribute = "data-mlr-text",
    chosenLang = "中文",
    mLstrings = MLstrings,
    countryCodes = false,
    countryCodeData = [],
} = {}) {
    const root = document.documentElement;

    var listOfLanguages = Object.keys(mLstrings[0]);
    mlrLangInUse = chosenLang;

    (function createMLDrop() {
        var mbPOCControlsLangDrop = document.getElementById(dropID);
        // Reset the menu
        mbPOCControlsLangDrop.innerHTML = "";
        // Now build the options
        listOfLanguages.forEach((lang, langidx) => {
            let HTMLoption = document.createElement("option");
            HTMLoption.value = lang;
            console.log(lang)
            HTMLoption.textContent = lang;
            mbPOCControlsLangDrop.appendChild(HTMLoption);

            if (lang === chosenLang) {
                mbPOCControlsLangDrop.value = lang;
            }
        });
        mbPOCControlsLangDrop.addEventListener("change", function(e) {

            mlrLangInUse = mbPOCControlsLangDrop[mbPOCControlsLangDrop.selectedIndex].value;
            resolveAllMLStrings();
            // Here we update the 2-digit lang attribute if required
            if (countryCodes === true) {
                if (!Array.isArray(countryCodeData) || !countryCodeData.length) {
                    console.warn("Cannot access strings for language codes");
                    return;
                }
                root.setAttribute("lang", updateCountryCodeOnHTML().code);
            }
        });
    })();

    function updateCountryCodeOnHTML() {
        return countryCodeData.find(this2Digit => this2Digit.name === mlrLangInUse);
    }

    function resolveAllMLStrings() {
        let stringsToBeResolved = document.querySelectorAll(`[${stringAttribute}]`);
        stringsToBeResolved.forEach(stringToBeResolved => {
            let originaltextContent = stringToBeResolved.textContent;
            let resolvedText = resolveMLString(originaltextContent, mLstrings);
            stringToBeResolved.textContent = resolvedText;
            stringToBeResolved.classList.remove('中文', 'ENG')
            stringToBeResolved.classList.add(mlrLangInUse)
        });
    }


};

function resolveMLString(stringToBeResolved, mLstrings) {
    var matchingStringIndex = mLstrings.find(function(stringObj) {
        // Create an array of the objects values:
        let stringValues = Object.values(stringObj);
        // Now return if we can find that string anywhere in there
        return stringValues.includes(stringToBeResolved);
    });
    if (matchingStringIndex) {
        return matchingStringIndex[mlrLangInUse];
    } else {
        // If we don't have a match in our language strings, return the original
        return stringToBeResolved;
    }
}

mlr({
    dropID: "lang-chooser",
    stringAttribute: "data-mlr-text",
    chosenLang: "中文",
    mLstrings: MLstrings,
    countryCodes: true,
    countryCodeData: mlCodes,
});
