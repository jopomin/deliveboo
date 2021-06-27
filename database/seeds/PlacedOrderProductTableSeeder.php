<?php

use Illuminate\Database\Seeder;
use App\Placed_order;
use App\Product;

class PlacedOrderProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* BEER CONDICIO */
        $product1 = Product::find(1);
        $product1->placed_orders()->attach([1], ['quantity' => 3]);
        $product2 = Product::find(2);
        $product2->placed_orders()->attach([1], ['quantity' => 2]);

        $product3 = Product::find(3);
        $product3->placed_orders()->attach([13], ['quantity' => 1]);
        $product5 = Product::find(5);
        $product5->placed_orders()->attach([13], ['quantity' => 1]);
        
        $product2_14 = Product::find(2);
        $product2_14->placed_orders()->attach([14], ['quantity' => 4]);
        $product7_14 = Product::find(7);
        $product7_14->placed_orders()->attach([14], ['quantity' => 2]);
        $product9_14 = Product::find(9);
        $product9_14->placed_orders()->attach([14], ['quantity' => 2]);

        $product5_15 = Product::find(5);
        $product5_15->placed_orders()->attach([15], ['quantity' => 2]);

        $product1_16 = Product::find(1);
        $product1_16->placed_orders()->attach([16], ['quantity' => 2]);
        $product3_16 = Product::find(3);
        $product3_16->placed_orders()->attach([16], ['quantity' => 3]);

        $product1_17 = Product::find(1);
        $product1_17->placed_orders()->attach([17], ['quantity' => 2]);
        $product2_17 = Product::find(2);
        $product2_17->placed_orders()->attach([17], ['quantity' => 2]);

        $product2_66 = Product::find(2);
        $product2_66->placed_orders()->attach([66], ['quantity' => 5]);
        $product10_66 = Product::find(10);
        $product10_66->placed_orders()->attach([66], ['quantity' => 3]);

        $product5_67 = Product::find(5);
        $product5_67->placed_orders()->attach([67], ['quantity' => 2]);
        
        $product4_68 = Product::find(4);
        $product4_68->placed_orders()->attach([68], ['quantity' => 4]);

        $product1_69 = Product::find(1);
        $product1_69->placed_orders()->attach([69], ['quantity' => 2]);
        $product11_69 = Product::find(11);
        $product11_69->placed_orders()->attach([69], ['quantity' => 1]);

        $product1_70 = Product::find(1);
        $product1_70->placed_orders()->attach([70], ['quantity' => 3]);
        $product9_70 = Product::find(9);
        $product9_70->placed_orders()->attach([70], ['quantity' => 3]);

        $product6_71 = Product::find(6);
        $product6_71->placed_orders()->attach([71], ['quantity' => 2]);
        $product7_71 = Product::find(7);
        $product7_71->placed_orders()->attach([71], ['quantity' => 2]);

        $product7_72 = Product::find(7);
        $product7_72->placed_orders()->attach([72], ['quantity' => 2]);
        $product3_72 = Product::find(3);
        $product3_72->placed_orders()->attach([72], ['quantity' => 4]);

        $product3_73 = Product::find(3);
        $product3_73->placed_orders()->attach([73], ['quantity' => 3]);
        $product5_73 = Product::find(5);
        $product5_73->placed_orders()->attach([73], ['quantity' => 2]);

        $product2_74 = Product::find(2);
        $product2_74->placed_orders()->attach([74], ['quantity' => 3]);
        $product5_74 = Product::find(5);
        $product5_74->placed_orders()->attach([74], ['quantity' => 1]);

        $product1_75 = Product::find(1);
        $product1_75->placed_orders()->attach([75], ['quantity' => 5]);
        $product8_75 = Product::find(8);
        $product8_75->placed_orders()->attach([75], ['quantity' => 4]);

        $product3_76 = Product::find(3);
        $product3_76->placed_orders()->attach([76], ['quantity' => 4]);
        $product6_76 = Product::find(6);
        $product6_76->placed_orders()->attach([76], ['quantity' => 4]);

        $product3_77 = Product::find(3);
        $product3_77->placed_orders()->attach([77], ['quantity' => 2]);
        $product4_77 = Product::find(4);
        $product4_77->placed_orders()->attach([77], ['quantity' => 3]);

        $product4_78 = Product::find(4);
        $product4_78->placed_orders()->attach([78], ['quantity' => 1]);
        $product5_78 = Product::find(5);
        $product5_78->placed_orders()->attach([78], ['quantity' => 1]);

        $product5_79 = Product::find(5);
        $product5_79->placed_orders()->attach([79], ['quantity' => 2]);
        $product7_79 = Product::find(7);
        $product7_79->placed_orders()->attach([79], ['quantity' => 2]);

        $product1_80 = Product::find(1);
        $product1_80->placed_orders()->attach([80], ['quantity' => 4]);
        $product2_80 = Product::find(2);
        $product2_80->placed_orders()->attach([80], ['quantity' => 2]);

        /* SAPEMORE */

        $product17 = Product::find(17);
        $product17->placed_orders()->attach([2], ['quantity' => 2]);
        $product18 = Product::find(18);
        $product18->placed_orders()->attach([2], ['quantity' => 1]);
        $product24 = Product::find(24);
        $product24->placed_orders()->attach([2], ['quantity' => 2]);
        $product17_18 = Product::find(17);
        $product17_18->placed_orders()->attach([18], ['quantity' => 3]);
        $product20_18 = Product::find(20);
        $product20_18->placed_orders()->attach([18], ['quantity' => 1]);
        $product13_19 = Product::find(13);
        $product13_19->placed_orders()->attach([19], ['quantity' => 2]);
        $product14_19 = Product::find(14);
        $product14_19->placed_orders()->attach([19], ['quantity' => 2]);
        $product15_20 = Product::find(15);
        $product15_20->placed_orders()->attach([20], ['quantity' => 1]);
        $product18_20 = Product::find(18);
        $product18_20->placed_orders()->attach([20], ['quantity' => 1]);

        /* ERBAVOGLIO */

        $product30 = Product::find(30);
        $product30->placed_orders()->attach([3], ['quantity' => 1]);
        $product33 = Product::find(33);
        $product33->placed_orders()->attach([3], ['quantity' => 1]);
        $product29_21 = Product::find(29);
        $product29_21->placed_orders()->attach([21], ['quantity' => 2]);
        $product30_22 = Product::find(30);
        $product30_22->placed_orders()->attach([22], ['quantity' => 2]);
        $product32_22 = Product::find(32);
        $product32_22->placed_orders()->attach([22], ['quantity' => 2]);
        $product31_23 = Product::find(31);
        $product31_23->placed_orders()->attach([23], ['quantity' => 1]);
        $product34_23 = Product::find(34);
        $product34_23->placed_orders()->attach([23], ['quantity' => 1]);
        $product29_24 = Product::find(29);
        $product29_24->placed_orders()->attach([24], ['quantity' => 2]);
        $product32_24 = Product::find(32);
        $product32_24->placed_orders()->attach([24], ['quantity' => 2]);

        /* XO */

        $product40 = Product::find(40);
        $product40->placed_orders()->attach([4], ['quantity' => 2]);
        $product47 = Product::find(47);
        $product47->placed_orders()->attach([4], ['quantity' => 1]);
        $product40_25 = Product::find(40);
        $product40_25->placed_orders()->attach([25], ['quantity' => 2]);
        $product46_25 = Product::find(46);
        $product46_25->placed_orders()->attach([25], ['quantity' => 2]);
        $product42_26 = Product::find(42);
        $product42_26->placed_orders()->attach([26], ['quantity' => 3]);
        $product44_27 = Product::find(44);
        $product44_27->placed_orders()->attach([27], ['quantity' => 1]);
        $product45_27 = Product::find(45);
        $product45_27->placed_orders()->attach([27], ['quantity' => 1]);
        $product50_28 = Product::find(50);
        $product50_28->placed_orders()->attach([28], ['quantity' => 2]);
        $product51_28 = Product::find(51);
        $product51_28->placed_orders()->attach([28], ['quantity' => 2]);

        /* L'INSOLITO */

        $product60 = Product::find(60);
        $product60->placed_orders()->attach([5], ['quantity' => 2]);
        $product61 = Product::find(61);
        $product61->placed_orders()->attach([5], ['quantity' => 2]);
        $product54_29 = Product::find(54);
        $product54_29->placed_orders()->attach([29], ['quantity' => 2]);
        $product55_30 = Product::find(55);
        $product55_30->placed_orders()->attach([30], ['quantity' => 2]);
        $product58_30 = Product::find(58);
        $product58_30->placed_orders()->attach([30], ['quantity' => 2]);
        $product52_31 = Product::find(52);
        $product52_31->placed_orders()->attach([31], ['quantity' => 1]);
        $product53_31 = Product::find(53);
        $product53_31->placed_orders()->attach([31], ['quantity' => 1]);
        $product60_32 = Product::find(60);
        $product60_32->placed_orders()->attach([32], ['quantity' => 4]);
        $product52_33 = Product::find(52);
        $product52_33->placed_orders()->attach([33], ['quantity' => 1]);
        $product54_33 = Product::find(54);
        $product54_33->placed_orders()->attach([33], ['quantity' => 1]);

        /* A RA GGHJAZZA */

        $product62 = Product::find(62);
        $product62->placed_orders()->attach([6], ['quantity' => 2]);
        $product65 = Product::find(65);
        $product65->placed_orders()->attach([6], ['quantity' => 2]);
        $product62_34 = Product::find(62);
        $product62_34->placed_orders()->attach([34], ['quantity' => 1]);
        $product63_34 = Product::find(63);
        $product63_34->placed_orders()->attach([34], ['quantity' => 1]);
        $product64_34 = Product::find(64);
        $product64_34->placed_orders()->attach([34], ['quantity' => 1]);
        $product65_35 = Product::find(65);
        $product65_35->placed_orders()->attach([35], ['quantity' => 3]);
        $product63_36 = Product::find(63);
        $product63_36->placed_orders()->attach([36], ['quantity' => 2]);
        $product69_36 = Product::find(69);
        $product69_36->placed_orders()->attach([36], ['quantity' => 1]);

        /* MOMO PIZZERIA */

        $product72 = Product::find(72);
        $product72->placed_orders()->attach([7], ['quantity' => 2]);
        $product73 = Product::find(73);
        $product73->placed_orders()->attach([7], ['quantity' => 2]);
        $product76 = Product::find(76);
        $product76->placed_orders()->attach([7], ['quantity' => 1]);
        $product78 = Product::find(78);
        $product78->placed_orders()->attach([7], ['quantity' => 1]);
        $product74_37 = Product::find(74);
        $product74_37->placed_orders()->attach([37], ['quantity' => 2]);
        $product74_38 = Product::find(74);
        $product74_38->placed_orders()->attach([38], ['quantity' => 4]);
        $product74_39 = Product::find(74);
        $product74_39->placed_orders()->attach([39], ['quantity' => 1]);
        $product75_39 = Product::find(75);
        $product75_39->placed_orders()->attach([39], ['quantity' => 2]);
        $product75_40 = Product::find(75);
        $product75_40->placed_orders()->attach([40], ['quantity' => 2]);
        $product78_40 = Product::find(78);
        $product78_40->placed_orders()->attach([40], ['quantity' => 2]);
        $product72_41 = Product::find(72);
        $product72_41->placed_orders()->attach([41], ['quantity' => 4]);
        $product73_41 = Product::find(73);
        $product73_41->placed_orders()->attach([41], ['quantity' => 4]);
        $product74_42 = Product::find(74);
        $product74_42->placed_orders()->attach([42], ['quantity' => 2]);

        /* I-SUSHI */

        $product82 = Product::find(82);
        $product82->placed_orders()->attach([8], ['quantity' => 1]);
        $product85 = Product::find(85);
        $product85->placed_orders()->attach([8], ['quantity' => 2]);
        $product86 = Product::find(86);
        $product86->placed_orders()->attach([8], ['quantity' => 2]);
        $product87 = Product::find(87);
        $product87->placed_orders()->attach([8], ['quantity' => 1]);
        $product82_43 = Product::find(82);
        $product82_43->placed_orders()->attach([43], ['quantity' => 3]);
        $product82_44 = Product::find(82);
        $product82_44->placed_orders()->attach([44], ['quantity' => 1]);
        $product83_44 = Product::find(83);
        $product83_44->placed_orders()->attach([44], ['quantity' => 2]);
        $product83_45 = Product::find(83);
        $product83_45->placed_orders()->attach([45], ['quantity' => 2]);
        $product85_45 = Product::find(85);
        $product85_45->placed_orders()->attach([45], ['quantity' => 2]);
        $product85_46 = Product::find(85);
        $product85_46->placed_orders()->attach([46], ['quantity' => 1]);
        $product88_46 = Product::find(88);
        $product88_46->placed_orders()->attach([46], ['quantity' => 2]);

        /* TIGELLA */

        $product97 = Product::find(97);
        $product97->placed_orders()->attach([9], ['quantity' => 2]);
        $product103 = Product::find(103);
        $product103->placed_orders()->attach([9], ['quantity' => 1]);
        $product108 = Product::find(108);
        $product108->placed_orders()->attach([9], ['quantity' => 1]);
        $product110 = Product::find(110);
        $product110->placed_orders()->attach([9], ['quantity' => 1]);
        $product97_47 = Product::find(97);
        $product97_47->placed_orders()->attach([47], ['quantity' => 2]);
        $product101_47 = Product::find(101);
        $product101_47->placed_orders()->attach([47], ['quantity' => 2]);
        $product99_48 = Product::find(99);
        $product99_48->placed_orders()->attach([48], ['quantity' => 3]);
        $product100_49 = Product::find(100);
        $product100_49->placed_orders()->attach([49], ['quantity' => 2]);
        $product102_49 = Product::find(102);
        $product102_49->placed_orders()->attach([49], ['quantity' => 1]);
        $product99_50 = Product::find(99);
        $product99_50->placed_orders()->attach([50], ['quantity' => 2]);
        $product102_50 = Product::find(102);
        $product102_50->placed_orders()->attach([50], ['quantity' => 1]);

        /* PIZZA GOURMET */

        $product111 = Product::find(111);
        $product111->placed_orders()->attach([10], ['quantity' => 3]);
        $product113 = Product::find(113);
        $product113->placed_orders()->attach([10], ['quantity' => 1]);
        $product111_51 = Product::find(111);
        $product111_51->placed_orders()->attach([51], ['quantity' => 3]);
        $product112_51 = Product::find(112);
        $product112_51->placed_orders()->attach([51], ['quantity' => 1]);
        $product113_51 = Product::find(113);
        $product113_51->placed_orders()->attach([51], ['quantity' => 1]);
        $product113_52 = Product::find(113);
        $product113_52->placed_orders()->attach([52], ['quantity' => 2]);
        $product116_52 = Product::find(116);
        $product116_52->placed_orders()->attach([52], ['quantity' => 2]);
        $product120_52 = Product::find(120);
        $product120_52->placed_orders()->attach([52], ['quantity' => 2]);
        $product114_53 = Product::find(114);
        $product114_53->placed_orders()->attach([53], ['quantity' => 2]);
        $product116_53 = Product::find(116);
        $product116_53->placed_orders()->attach([53], ['quantity' => 2]);
        $product111_54 = Product::find(111);
        $product111_54->placed_orders()->attach([54], ['quantity' => 3]);
        $product112_54 = Product::find(112);
        $product112_54->placed_orders()->attach([54], ['quantity' => 2]);
        $product112_55 = Product::find(112);
        $product112_55->placed_orders()->attach([55], ['quantity' => 1]);
        $product113_55 = Product::find(113);
        $product113_55->placed_orders()->attach([55], ['quantity' => 2]);
        $product116_55 = Product::find(116);
        $product116_55->placed_orders()->attach([55], ['quantity' => 2]);
        $product119_55 = Product::find(119);
        $product119_55->placed_orders()->attach([55], ['quantity' => 1]);
        $product112_56 = Product::find(112);
        $product112_56->placed_orders()->attach([56], ['quantity' => 1]);
        $product119_56 = Product::find(119);
        $product119_56->placed_orders()->attach([56], ['quantity' => 1]);

        /* DAI C'ANDAM */

        $product123 = Product::find(123);
        $product123->placed_orders()->attach([11], ['quantity' => 1]);
        $product124 = Product::find(124);
        $product124->placed_orders()->attach([11], ['quantity' => 1]);
        $product126 = Product::find(126);
        $product126->placed_orders()->attach([11], ['quantity' => 1]);
        $product123_57 = Product::find(123);
        $product123_57->placed_orders()->attach([57], ['quantity' => 4]);
        $product123_58 = Product::find(123);
        $product123_58->placed_orders()->attach([58], ['quantity' => 1]);
        $product124_58 = Product::find(124);
        $product124_58->placed_orders()->attach([58], ['quantity' => 2]);
        $product129_58 = Product::find(129);
        $product129_58->placed_orders()->attach([58], ['quantity' => 1]);
        $product124_59 = Product::find(124);
        $product124_59->placed_orders()->attach([59], ['quantity' => 2]);
        $product131_59 = Product::find(131);
        $product131_59->placed_orders()->attach([59], ['quantity' => 2]);
        $product125_60 = Product::find(125);
        $product125_60->placed_orders()->attach([60], ['quantity' => 3]);
        $product131_60 = Product::find(131);
        $product131_60->placed_orders()->attach([60], ['quantity' => 2]);

        /* SOSTA EMILIANA */

        $product137 = Product::find(137);
        $product137->placed_orders()->attach([12], ['quantity' => 1]);
        $product139 = Product::find(139);
        $product139->placed_orders()->attach([12], ['quantity' => 1]);
        $product135_61 = Product::find(135);
        $product135_61->placed_orders()->attach([61], ['quantity' => 2]);
        $product136_61 = Product::find(136);
        $product136_61->placed_orders()->attach([61], ['quantity' => 1]);
        $product136_62 = Product::find(136);
        $product136_62->placed_orders()->attach([62], ['quantity' => 2]);
        $product141_62 = Product::find(141);
        $product141_62->placed_orders()->attach([62], ['quantity' => 2]);
        $product137_63 = Product::find(137);
        $product137_63->placed_orders()->attach([63], ['quantity' => 2]);
        $product141_63 = Product::find(141);
        $product141_63->placed_orders()->attach([63], ['quantity' => 1]);
        $product137_64 = Product::find(137);
        $product137_64->placed_orders()->attach([64], ['quantity' => 4]);
        $product138_64 = Product::find(138);
        $product138_64->placed_orders()->attach([64], ['quantity' => 2]);
        $product140_64 = Product::find(140);
        $product140_64->placed_orders()->attach([64], ['quantity' => 2]);
        $product135_65 = Product::find(135);
        $product135_65->placed_orders()->attach([65], ['quantity' => 2]);
        $product138_65 = Product::find(138);
        $product138_65->placed_orders()->attach([65], ['quantity' => 2]);
        $product146_65 = Product::find(146);
        $product146_65->placed_orders()->attach([65], ['quantity' => 2]);

}

}
