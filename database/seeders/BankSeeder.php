<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks = [
            ["bank_name" => "3Line",  "bank_code" => "110005",  "short_code" => ""],
            ["bank_name" => "Ab MFB",  "bank_code" => "090270",  "short_code" => ""],
            ["bank_name" => "Abbey Mortgage Bank",  "bank_code" => "070010",  "short_code" => ""],
            ["bank_name" => "Above Only MFB",  "bank_code" => "090260",  "short_code" => ""],
            ["bank_name" => "Abu MFB",  "bank_code" => "090197",  "short_code" => ""],
            ["bank_name" => "Access Bank Nigeria",  "bank_code" => "000014",  "short_code" => "044"],
            ["bank_name" => "Access Yello and Beta",  "bank_code" => "100052",  "short_code" => ""],
            ["bank_name" => "Accessmoney",  "bank_code" => "100013",  "short_code" => "323"],
            ["bank_name" => "Accion MFB",  "bank_code" => "090134",  "short_code" => ""],
            ["bank_name" => "Addosser MFB",  "bank_code" => "090160",  "short_code" => ""],
            ["bank_name" => "Adeyemi College Staff MFB",  "bank_code" => "090268",  "short_code" => ""],
            ["bank_name" => "Afekhafe MFB",  "bank_code" => "090292",  "short_code" => ""],
            ["bank_name" => "Ag Mortgage Bank",  "bank_code" => "100028",  "short_code" => ""],
            ["bank_name" => "Al-Barkah MFB",  "bank_code" => "090133",  "short_code" => ""],
            ["bank_name" => "Al-Hayat MFB",  "bank_code" => "090277",  "short_code" => ""],
            ["bank_name" => "Alekun MFB",  "bank_code" => "090259",  "short_code" => ""],
            ["bank_name" => "Alert MFB",  "bank_code" => "090297",  "short_code" => ""],
            ["bank_name" => "Allworkers MFB",  "bank_code" => "090131",  "short_code" => ""],
            ["bank_name" => "Alpha Kapital MFB",  "bank_code" => "090169",  "short_code" => ""],
            ["bank_name" => "Amju Unique MFB",  "bank_code" => "090180",  "short_code" => ""],
            ["bank_name" => "AMML MFB",  "bank_code" => "090116",  "short_code" => ""],
            ["bank_name" => "Apeks MFB",  "bank_code" => "090143",  "short_code" => ""],
            ["bank_name" => "Arise MFB",  "bank_code" => "090282",  "short_code" => ""],
            ["bank_name" => "Aso Savings And Loans",  "bank_code" => "090001",  "short_code" => "401"],
            ["bank_name" => "Assetmatrix MFB",  "bank_code" => "090287",  "short_code" => ""],
            ["bank_name" => "Astrapolaris MFB",  "bank_code" => "090172",  "short_code" => ""],
            ["bank_name" => "Auchi MFB",  "bank_code" => "090264",  "short_code" => ""],
            ["bank_name" => "Baines Credit MFB",  "bank_code" => "090188",  "short_code" => ""],
            ["bank_name" => "Balogun Gambari MFB",  "bank_code" => "090326",  "short_code" => ""],
            ["bank_name" => "Baobab MFB",  "bank_code" => "090136",  "short_code" => ""],
            ["bank_name" => "BC Kash MFB",  "bank_code" => "090127",  "short_code" => ""],
            ["bank_name" => "Boctrust MFB",  "bank_code" => "090117",  "short_code" => ""],
            ["bank_name" => "Bosak MFB",  "bank_code" => "090176",  "short_code" => ""],
            ["bank_name" => "Bowen MFB",  "bank_code" => "090148",  "short_code" => ""],
            ["bank_name" => "Brent Mortgage Bank",  "bank_code" => "070015",  "short_code" => ""],
            ["bank_name" => "Brethren MFB",  "bank_code" => "090293",  "short_code" => ""],
            ["bank_name" => "Brightway MFB",  "bank_code" => "090308",  "short_code" => ""],
            ["bank_name" => "Cellulant",  "bank_code" => "100005",  "short_code" => ""],
            ["bank_name" => "CEMCS MFB",  "bank_code" => "090154",  "short_code" => "50823"],
            ["bank_name" => "Chikum MFB",  "bank_code" => "090141",  "short_code" => ""],
            ["bank_name" => "CIT MFB",  "bank_code" => "090144",  "short_code" => ""],
            ["bank_name" => "Citibank Nigeria",  "bank_code" => "000009",  "short_code" => "023"],
            ["bank_name" => "Consumer MFB",  "bank_code" => "090130",  "short_code" => ""],
            ["bank_name" => "Contec Global Infotech",  "bank_code" => "100032",  "short_code" => ""],
            ["bank_name" => "Coronation Merchant Bank",  "bank_code" => "060001",  "short_code" => "902"],
            ["bank_name" => "Covenant",  "bank_code" => "070006",  "short_code" => ""],
            ["bank_name" => "Credit Afrique MFB",  "bank_code" => "090159",  "short_code" => ""],
            ["bank_name" => "Daylight MFB",  "bank_code" => "090167",  "short_code" => ""],
            ["bank_name" => "E-Barcs MFB",  "bank_code" => "090156",  "short_code" => ""],
            ["bank_name" => "Eagle Flight MFB",  "bank_code" => "090294",  "short_code" => ""],
            ["bank_name" => "Eartholeum (Qik Qik)",  "bank_code" => "100021",  "short_code" => ""],
            ["bank_name" => "Ecobank Bank",  "bank_code" => "000010",  "short_code" => "050"],
            ["bank_name" => "Ecobank Xpress",  "bank_code" => "100008",  "short_code" => "307"],
            ["bank_name" => "EdFin MFB",  "bank_code" => "090310",  "short_code" => ""],
            ["bank_name" => "Ekondo MFB",  "bank_code" => "090097",  "short_code" => "562"],
            ["bank_name" => "Emeralds MFB",  "bank_code" => "090273",  "short_code" => ""],
            ["bank_name" => "Empire Trust MFB",  "bank_code" => "090114",  "short_code" => ""],
            ["bank_name" => "Esan MFB",  "bank_code" => "090189",  "short_code" => ""],
            ["bank_name" => "Eso-E MFB",  "bank_code" => "090166",  "short_code" => ""],
            ["bank_name" => "Etranzact",  "bank_code" => "100006",  "short_code" => ""],
            ["bank_name" => "Evangel MFB",  "bank_code" => "090304",  "short_code" => ""],
            ["bank_name" => "Fast MFB",  "bank_code" => "090179",  "short_code" => ""],
            ["bank_name" => "FBNQuest Merchant Bank",  "bank_code" => "060002",  "short_code" => "911"],
            ["bank_name" => "FCMB Easy Account",  "bank_code" => "100031",  "short_code" => ""],
            ["bank_name" => "FCT MFB",  "bank_code" => "090290",  "short_code" => ""],
            ["bank_name" => "Federal University Dutse MFB",  "bank_code" => "090318",  "short_code" => ""],
            ["bank_name" => "Fedpoly Nasarawa MFB",  "bank_code" => "090298",  "short_code" => ""],
            ["bank_name" => "FETS (My Wallet)",  "bank_code" => "100001",  "short_code" => ""],
            ["bank_name" => "FFS Microfinance",  "bank_code" => "090153",  "short_code" => ""],
            ["bank_name" => "Fidelity Bank",  "bank_code" => "000007",  "short_code" => "070"],
            ["bank_name" => "Fidelity Mobile",  "bank_code" => "100019",  "short_code" => ""],
            ["bank_name" => "Fidfund MFB",  "bank_code" => "090126",  "short_code" => ""],
            ["bank_name" => "Finatrust MFB",  "bank_code" => "090111",  "short_code" => ""],
            ["bank_name" => "First Apple",  "bank_code" => "110004",  "short_code" => ""],
            ["bank_name" => "First Bank of Nigeria",  "bank_code" => "000016",  "short_code" => "011"],
            ["bank_name" => "First City Monument Bank",  "bank_code" => "000003",  "short_code" => "214"],
            ["bank_name" => "First Gen Mortgage Bank",  "bank_code" => "070014",  "short_code" => ""],
            ["bank_name" => "First Multiple MFB",  "bank_code" => "090163",  "short_code" => ""],
            ["bank_name" => "First Option MFB",  "bank_code" => "090285",  "short_code" => ""],
            ["bank_name" => "First Royal MFB",  "bank_code" => "090164",  "short_code" => ""],
            ["bank_name" => "First Trust Mortgage Bank",  "bank_code" => "090005",  "short_code" => ""],
            ["bank_name" => "First Trust Mortgage Bank",  "bank_code" => "090107",  "short_code" => ""],
            ["bank_name" => "Firstmonie Wallet",  "bank_code" => "100014",  "short_code" => ""],
            ["bank_name" => "Flutterwave Tech Solutions",  "bank_code" => "110002",  "short_code" => ""],
            ["bank_name" => "Fortis MFB",  "bank_code" => "070002",  "short_code" => ""],
            ["bank_name" => "Fortis Mobile",  "bank_code" => "100016",  "short_code" => ""],
            ["bank_name" => "FSDH Merchant Bank",  "bank_code" => "400001",  "short_code" => "501"],
            ["bank_name" => "Full Range MFB",  "bank_code" => "090145",  "short_code" => ""],
            ["bank_name" => "Futo MFB",  "bank_code" => "090158",  "short_code" => ""],
            ["bank_name" => "Gashua MFB",  "bank_code" => "090168",  "short_code" => ""],
            ["bank_name" => "Gateway Mortgage Bank",  "bank_code" => "070009",  "short_code" => ""],
            ["bank_name" => "Globus Bank",  "bank_code" => "000027",  "short_code" => "103"],
            ["bank_name" => "Glory MFB",  "bank_code" => "090278",  "short_code" => ""],
            ["bank_name" => "Gomoney",  "bank_code" => "100022",  "short_code" => null],
            ["bank_name" => "Gowans MFB",  "bank_code" => "090122",  "short_code" => ""],
            ["bank_name" => "Greenbank MFB",  "bank_code" => "090178",  "short_code" => ""],
            ["bank_name" => "Greenville MFB",  "bank_code" => "090269",  "short_code" => ""],
            ["bank_name" => "Grooming MFB",  "bank_code" => "090195",  "short_code" => ""],
            ["bank_name" => "GT Mobile Money",  "bank_code" => "100009",  "short_code" => "315"],
            ["bank_name" => "Guaranty Trust Bank",  "bank_code" => "000013",  "short_code" => "058"],
            ["bank_name" => "Hackman MFB",  "bank_code" => "090147",  "short_code" => ""],
            ["bank_name" => "Haggai Mortgage Bank",  "bank_code" => "070017",  "short_code" => ""],
            ["bank_name" => "Hala MFB",  "bank_code" => "090291",  "short_code" => ""],
            ["bank_name" => "Hasal MFB",  "bank_code" => "090121",  "short_code" => "50383"],
            ["bank_name" => "Hedonmark",  "bank_code" => "100017",  "short_code" => ""],
            ["bank_name" => "Heritage Bank",  "bank_code" => "000020",  "short_code" => "030"],
            ["bank_name" => "Ibile MFB",  "bank_code" => "090118",  "short_code" => ""],
            ["bank_name" => "Ikire MFB",  "bank_code" => "090275",  "short_code" => ""],
            ["bank_name" => "Ikire MFB",  "bank_code" => "090279",  "short_code" => ""],
            ["bank_name" => "Imo State MFB",  "bank_code" => "090258",  "short_code" => ""],
            ["bank_name" => "Imperial Homes Mortgage Bank",  "bank_code" => "100024",  "short_code" => ""],
            ["bank_name" => "Infinity MFB",  "bank_code" => "090157",  "short_code" => ""],
            ["bank_name" => "Infinity Trust Mortgage Bank",  "bank_code" => "070016",  "short_code" => ""],
            ["bank_name" => "Innovectives Kesh",  "bank_code" => "100029",  "short_code" => ""],
            ["bank_name" => "Interswitch",  "bank_code" => "110003",  "short_code" => ""],
            ["bank_name" => "IRL MFB",  "bank_code" => "090149",  "short_code" => ""],
            ["bank_name" => "Itex Integrated Services",  "bank_code" => "090211",  "short_code" => ""],
            ["bank_name" => "Jaiz Bank",  "bank_code" => "000006",  "short_code" => "301"],
            ["bank_name" => "Jubilee Life",  "bank_code" => "090003",  "short_code" => ""],
            ["bank_name" => "Kadpoly MFB",  "bank_code" => "090320",  "short_code" => ""],
            ["bank_name" => "KCMB MFB",  "bank_code" => "090191",  "short_code" => ""],
            ["bank_name" => "Kegow",  "bank_code" => "100015",  "short_code" => ""],
            ["bank_name" => "Keystone Bank",  "bank_code" => "000002",  "short_code" => "082"],
            ["bank_name" => "Kontagora MFB",  "bank_code" => "090299",  "short_code" => ""],
            ["bank_name" => "Kredi Bank",  "bank_code" => "090380",  "short_code" => "50200"],
            ["bank_name" => "Kuda MFB",  "bank_code" => "090267",  "short_code" => "50211"],
            ["bank_name" => "La Fayette MFB",  "bank_code" => "090155",  "short_code" => ""],
            ["bank_name" => "Lagos Building Investment Company",  "bank_code" => "070012",  "short_code" => ""],
            ["bank_name" => "LAPO MFB",  "bank_code" => "090177",  "short_code" => ""],
            ["bank_name" => "Lavender MFB",  "bank_code" => "090271",  "short_code" => ""],
            ["bank_name" => "Lovonus MFB",  "bank_code" => "090265",  "short_code" => ""],
            ["bank_name" => "M-Kudi",  "bank_code" => "100011",  "short_code" => ""],
            ["bank_name" => "Mainstreet MFB",  "bank_code" => "090171",  "short_code" => ""],
            ["bank_name" => "Malachy MFB",  "bank_code" => "090174",  "short_code" => ""],
            ["bank_name" => "Megapraise MFB",  "bank_code" => "090280",  "short_code" => ""],
            ["bank_name" => "Microvis MFB",  "bank_code" => "090113",  "short_code" => ""],
            ["bank_name" => "Midland MFB",  "bank_code" => "090192",  "short_code" => ""],
            ["bank_name" => "Mimoney Intellifin Solutions",  "bank_code" => "100027",  "short_code" => ""],
            ["bank_name" => "Mint-Finex MFB",  "bank_code" => "090281",  "short_code" => ""],
            ["bank_name" => "Money Trust MFB",  "bank_code" => "090129",  "short_code" => ""],
            ["bank_name" => "Moneybox",  "bank_code" => "100020",  "short_code" => ""],
            ["bank_name" => "Mutual Benefits Mifb",  "bank_code" => "090190",  "short_code" => ""],
            ["bank_name" => "Mutual Trust MFB",  "bank_code" => "090151",  "short_code" => ""],
            ["bank_name" => "Nargata MFB",  "bank_code" => "090152",  "short_code" => ""],
            ["bank_name" => "Ndiorah MFB",  "bank_code" => "090128",  "short_code" => ""],
            ["bank_name" => "New Dawn MFB",  "bank_code" => "090205",  "short_code" => ""],
            ["bank_name" => "New Prudential Bank",  "bank_code" => "090108",  "short_code" => ""],
            ["bank_name" => "Nigerian Navy MFB",  "bank_code" => "090263",  "short_code" => ""],
            ["bank_name" => "Nigerian Police Force MFB",  "bank_code" => "070001",  "short_code" => ""],
            ["bank_name" => "Nirsal MFB",  "bank_code" => "090194",  "short_code" => ""],
            ["bank_name" => "Nnew Women MFB",  "bank_code" => "090283",  "short_code" => ""],
            ["bank_name" => "Nova Merchant Bank",  "bank_code" => "060003",  "short_code" => "561"],
            ["bank_name" => "Ohafia MFB",  "bank_code" => "090119",  "short_code" => ""],
            ["bank_name" => "Okpoga MFB",  "bank_code" => "090161",  "short_code" => ""],
            ["bank_name" => "Olabisi Onabanjo University MFB",  "bank_code" => "090272",  "short_code" => ""],
            ["bank_name" => "Omiye MFB",  "bank_code" => "090295",  "short_code" => ""],
            ["bank_name" => "Omoluabi Mortgage Bank",  "bank_code" => "070007",  "short_code" => ""],
            ["bank_name" => "One Finance",  "bank_code" => "100026",  "short_code" => "565"],
            ["bank_name" => "Paga",  "bank_code" => "100002",  "short_code" => ""],
            ["bank_name" => "Page Financials",  "bank_code" => "070008",  "short_code" => ""],
            ["bank_name" => "Palmpay",  "bank_code" => "100033",  "short_code" => ""],
            ["bank_name" => "Parallex MFB",  "bank_code" => "090004",  "short_code" => "526"],
            ["bank_name" => "Parkway-Readycash",  "bank_code" => "100003",  "short_code" => "311"],
            ["bank_name" => "Patrickgold MFB",  "bank_code" => "090317",  "short_code" => ""],
            ["bank_name" => "Payattitude Online",  "bank_code" => "110001",  "short_code" => ""],
            ["bank_name" => "Paycom (Opay)",  "bank_code" => "100004",  "short_code" => "999992"],
            ["bank_name" => "Paystack Payments",  "bank_code" => "110006",  "short_code" => ""],
            ["bank_name" => "Pecantrust MFB",  "bank_code" => "090137",  "short_code" => ""],
            ["bank_name" => "Pennywise MFB",  "bank_code" => "090196",  "short_code" => ""],
            ["bank_name" => "Personal Trust MFB",  "bank_code" => "090135",  "short_code" => ""],
            ["bank_name" => "Petra MFB",  "bank_code" => "090165",  "short_code" => ""],
            ["bank_name" => "Pillar MFB",  "bank_code" => "090289",  "short_code" => ""],
            ["bank_name" => "Platinum Mortgage Bank",  "bank_code" => "070013",  "short_code" => ""],
            ["bank_name" => "Polaris Bank",  "bank_code" => "000008",  "short_code" => "076"],
            ["bank_name" => "Polyuwana MFB",  "bank_code" => "090296",  "short_code" => ""],
            ["bank_name" => "Prestige MFB",  "bank_code" => "090274",  "short_code" => ""],
            ["bank_name" => "Providus Bank",  "bank_code" => "000023",  "short_code" => "101"],
            ["bank_name" => "Purplemoney MFB",  "bank_code" => "090303",  "short_code" => ""],
            ["bank_name" => "Quickfund MFB",  "bank_code" => "090261",  "short_code" => ""],
            ["bank_name" => "Rahama MFB",  "bank_code" => "090170",  "short_code" => ""],
            ["bank_name" => "Rand Merchant Bank",  "bank_code" => "000024",  "short_code" => "502"],
            ["bank_name" => "Refuge Mortgage Bank",  "bank_code" => "070011",  "short_code" => ""],
            ["bank_name" => "Regent MFB",  "bank_code" => "090125",  "short_code" => ""],
            ["bank_name" => "Reliance MFB",  "bank_code" => "090173",  "short_code" => ""],
            ["bank_name" => "Renmoney MFB",  "bank_code" => "090198",  "short_code" => ""],
            ["bank_name" => "Richway MFB",  "bank_code" => "090132",  "short_code" => ""],
            ["bank_name" => "Rolez Bank",  "bank_code" => "090405",  "short_code" => "50515"],
            ["bank_name" => "Royal Exchange MFB",  "bank_code" => "090138",  "short_code" => ""],
            ["bank_name" => "Rubies MFB",  "bank_code" => "090175",  "short_code" => "125"],
            ["bank_name" => "Safe Haven MFB",  "bank_code" => "090286",  "short_code" => ""],
            ["bank_name" => "Safetrust Mortgage Bank",  "bank_code" => "090006",  "short_code" => ""],
            ["bank_name" => "Sagamu MFB",  "bank_code" => "090140",  "short_code" => ""],
            ["bank_name" => "Seed Capital MFB",  "bank_code" => "090112",  "short_code" => ""],
            ["bank_name" => "Sparkle Bank",  "bank_code" => "090325",  "short_code" => "51310"],
            ["bank_name" => "Stanbic IBTC",  "bank_code" => "000012",  "short_code" => "221"],
            ["bank_name" => "Stanbic IBTC @Ease Wal",  "bank_code" => "100007",  "short_code" => "304"],
            ["bank_name" => "Standard Chartered Bank",  "bank_code" => "000021",  "short_code" => "068"],
            ["bank_name" => "Stanford MFB",  "bank_code" => "090162",  "short_code" => ""],
            ["bank_name" => "Stellas MFB",  "bank_code" => "090262",  "short_code" => ""],
            ["bank_name" => "Sterling Bank",  "bank_code" => "000001",  "short_code" => "232"],
            ["bank_name" => "Sulspap MFB",  "bank_code" => "090305",  "short_code" => ""],
            ["bank_name" => "Suntrust Bank",  "bank_code" => "000022",  "short_code" => "100"],
            ["bank_name" => "Tagpay",  "bank_code" => "100023",  "short_code" => ""],
            ["bank_name" => "Taj Bank",  "bank_code" => "000026",  "short_code" => "302"],
            ["bank_name" => "TCF MFB",  "bank_code" => "090115",  "short_code" => "51211"],
            ["bank_name" => "TeamApt",  "bank_code" => "110007",  "short_code" => ""],
            ["bank_name" => "Teasy Mobile",  "bank_code" => "100010",  "short_code" => ""],
            ["bank_name" => "Titan Trust Bank",  "bank_code" => "000025",  "short_code" => "102"],
            ["bank_name" => "Trident MFB",  "bank_code" => "090146",  "short_code" => ""],
            ["bank_name" => "Trustbanc J6 MFB",  "bank_code" => "090123",  "short_code" => ""],
            ["bank_name" => "Trustfund MFB",  "bank_code" => "090276",  "short_code" => ""],
            ["bank_name" => "UNIBEN MFB",  "bank_code" => "090266",  "short_code" => ""],
            ["bank_name" => "UNICAL MFB",  "bank_code" => "090193",  "short_code" => ""],
            ["bank_name" => "Union Bank of Nigeria",  "bank_code" => "000018",  "short_code" => "032"],
            ["bank_name" => "United Bank for Africa",  "bank_code" => "000004",  "short_code" => "033"],
            ["bank_name" => "Unity Bank",  "bank_code" => "000011",  "short_code" => "215"],
            ["bank_name" => "Unn MFB",  "bank_code" => "090251",  "short_code" => ""],
            ["bank_name" => "VFD MFB",  "bank_code" => "090110",  "short_code" => "566"],
            ["bank_name" => "Virtue MFB",  "bank_code" => "090150",  "short_code" => ""],
            ["bank_name" => "Visa MFB",  "bank_code" => "090139",  "short_code" => ""],
            ["bank_name" => "Vtnetwork",  "bank_code" => "100012",  "short_code" => ""],
            ["bank_name" => "Wema Bank",  "bank_code" => "000017",  "short_code" => "035"],
            ["bank_name" => "Wetland MFB",  "bank_code" => "090120",  "short_code" => ""],
            ["bank_name" => "Xslnce MFB",  "bank_code" => "090124",  "short_code" => ""],
            ["bank_name" => "Yes MFB",  "bank_code" => "090142",  "short_code" => ""],
            ["bank_name" => "Zenith Bank",  "bank_code" => "000015",  "short_code" => "057"],
            ["bank_name" => "Zenith Mobile",  "bank_code" => "100018",  "short_code" => "322"],
            ["bank_name" => "Zinternet",  "bank_code" => "100025",  "short_code" => ""]
        ];
        
        DB::table('banks')->insert($banks);
    }
}
