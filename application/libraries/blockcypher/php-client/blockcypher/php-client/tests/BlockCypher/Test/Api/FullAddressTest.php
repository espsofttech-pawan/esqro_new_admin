<?php

namespace BlockCypher\Test\Api;

use BlockCypher\Api\FullAddress;

/**
 * Class FullAddressTest
 *
 * @package BlockCypher\Test\Api
 */
class FullAddressTest extends ResourceModelTestCase
{
    /**
     * Tests for Serialization and Deserialization Issues
     * @return FullAddress
     */
    public function testSerializationDeserialization()
    {
        $obj = new FullAddress(self::getJson());

        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getAddress());
        $this->assertNotNull($obj->getTotalReceived());
        $this->assertNotNull($obj->getTotalSent());
        $this->assertNotNull($obj->getBalance());
        $this->assertNotNull($obj->getUnconfirmedBalance());
        $this->assertNotNull($obj->getFinalBalance());
        $this->assertNotNull($obj->getNTx());
        $this->assertNotNull($obj->getUnconfirmedNTx());
        $this->assertNotNull($obj->getFinalNTx());
        $this->assertNotNull($obj->getTxs());
        //$this->assertNotNull($obj->getTxUrl()); // Not present in FullAddress

        $this->assertEquals(self::getJson(), $obj->toJSON());

        return $obj;
    }


    /**
     * Gets Json String of Object FullAddress
     * @return string
     */
    public static function getJson()
    {
        /*
        {
            "address": "1DEP8i3QJCsomS4BSMY2RpU1upv62aGvhD",
            "total_received": 4433416,
            "total_sent": 0,
            "balance": 4433416,
            "unconfirmed_balance": 0,
            "final_balance": 0,
            "n_tx": 7,
            "unconfirmed_n_tx": 0,
            "final_n_tx": 7,
            "txs": [
            {
                "block_hash": "00000000000000006548ac8dc283c97e8165023dc1fdbbca2eaa75f0143f4a8c",
                "block_height": 302013,
                "hash": "14b1052855bbf6561bc4db8aa501762e7cc1e86994dda9e782a6b73b1ce0dc1e",
                "addresses": [
                    "17astdTmG8zzVmry8mV8A7atAr3XefEgRX",
                    "1DEP8i3QJCsomS4BSMY2RpU1upv62aGvhD"
                ],
                "total": 8835413,
                "fees": 10000,
                "preference": "medium",
                "relayed_by": "",
                "confirmed": "2014-05-22T03:46:25Z",
                "received": "2014-05-22T03:46:25Z",
                "ver": 1,
                "lock_time": 0,
                "double_spend": false,
                "vin_sz": 1,
                "vout_sz": 2,
                "confirmations": 51194,
                "confidence": 1,
                "inputs": [
                    {
                        "prev_hash": "4cff011ec53022f2ae47197d1a2fd4a6ac2a80139f4d0131c1fed625ed5dc869",
                        "output_index": 1,
                        "script": "483045022035695e3b237733c70a56286eccd8df41b4d22cd103ed9b2df44010caa3bc71430221008f58461c937e8fe6cc6d37a9aaee3927762cce4565a4c386bbcd9d82915acfc50141047b1d511b8559a2003ca88715bc8331f057fa4ebf11f411142509a8ffd2f2d36d5a5e4b6019d6eb3e16878f24fd8d55676050c28b4bc5e4c44f39245beedae100",
                        "output_value": 8845413,
                        "sequence": 4294967295,
                        "addresses": [
                            "17astdTmG8zzVmry8mV8A7atAr3XefEgRX"
                        ],
                        "script_type": "pay-to-pubkey-hash"
                    }
                ],
                "outputs": [
                    {
                        "value": 20213,
                        "script": "76a9148629647bd642a2372d846a7660e210c8414f047c88ac",
                        "addresses": [
                            "1DEP8i3QJCsomS4BSMY2RpU1upv62aGvhD"
                        ],
                        "script_type": "pay-to-pubkey-hash"
                    },
                    {
                        "value": 8815200,
                        "script": "76a9144838f65fc4e06c644423ad0430de11ca5785dcd088ac",
                        "spent_by": "582a50f3a756c3261f8f085185e5975a762e239e95a30bcf1a4f2e31e0f834ab",
                        "addresses": [
                            "17astdTmG8zzVmry8mV8A7atAr3XefEgRX"
                        ],
                        "script_type": "pay-to-pubkey-hash"
                    }
                ]
                },
                {
                "block_hash": "00000000000000006d3bdfe1127d541110a18ce5b54bcdeb51e10399f6ec00b2",
                "block_height": 302002,
                "hash": "4cff011ec53022f2ae47197d1a2fd4a6ac2a80139f4d0131c1fed625ed5dc869",
                "addresses": [
                    "17astdTmG8zzVmry8mV8A7atAr3XefEgRX",
                    "1DEP8i3QJCsomS4BSMY2RpU1upv62aGvhD"
                ],
                "total": 8886009,
                "fees": 10000,
                "preference": "medium",
                "relayed_by": "",
                "confirmed": "2014-05-22T02:56:08Z",
                "received": "2014-05-22T02:56:08Z",
                "ver": 1,
                "lock_time": 0,
                "double_spend": false,
                "vin_sz": 1,
                "vout_sz": 2,
                "confirmations": 51205,
                "confidence": 1,
                "inputs": [
                {
                    "prev_hash": "ea1cbb874ed4e40add51b4d65b877dc4e8d69bb63f5b2220a79d673c413b778a",
                    "output_index": 1,
                    "script": "483045022100f50d876c0f213f99319752d4381c1be341f187bf32c53e2e89fae0df34bce2a202206d1f73005cdd6dcaab3cd74ef3870950202623e976b737f75980e91447fea7cc0141047b1d511b8559a2003ca88715bc8331f057fa4ebf11f411142509a8ffd2f2d36d5a5e4b6019d6eb3e16878f24fd8d55676050c28b4bc5e4c44f39245beedae100",
                    "output_value": 8896009,
                    "sequence": 4294967295,
                    "addresses": [
                        "17astdTmG8zzVmry8mV8A7atAr3XefEgRX"
                    ],
                    "script_type": "pay-to-pubkey-hash"
                }
                ],
                "outputs": [
                {
                    "value": 40596,
                    "script": "76a9148629647bd642a2372d846a7660e210c8414f047c88ac",
                    "addresses": [
                        "1DEP8i3QJCsomS4BSMY2RpU1upv62aGvhD"
                    ],
                    "script_type": "pay-to-pubkey-hash"
                },
                {
                    "value": 8845413,
                    "script": "76a9144838f65fc4e06c644423ad0430de11ca5785dcd088ac",
                    "spent_by": "14b1052855bbf6561bc4db8aa501762e7cc1e86994dda9e782a6b73b1ce0dc1e",
                    "addresses": [
                        "17astdTmG8zzVmry8mV8A7atAr3XefEgRX"
                    ],
                    "script_type": "pay-to-pubkey-hash"
                }
                ]
                },
                {
                    "block_hash": "00000000000000006d3bdfe1127d541110a18ce5b54bcdeb51e10399f6ec00b2",
                    "block_height": 302002,
                    "hash": "ea1cbb874ed4e40add51b4d65b877dc4e8d69bb63f5b2220a79d673c413b778a",
                    "addresses": [
                        "17astdTmG8zzVmry8mV8A7atAr3XefEgRX",
                        "1DEP8i3QJCsomS4BSMY2RpU1upv62aGvhD"
                    ],
                    "total": 8997500,
                    "fees": 10000,
                    "preference": "medium",
                    "relayed_by": "",
                    "confirmed": "2014-05-22T02:56:08Z",
                    "received": "2014-05-22T02:56:08Z",
                    "ver": 1,
                    "lock_time": 0,
                    "double_spend": false,
                    "vin_sz": 1,
                    "vout_sz": 2,
                    "confirmations": 51205,
                    "confidence": 1,
                    "inputs": [
                    {
                        "prev_hash": "306541aa7848b9f909282eb5134d3aa3221feed8e8022b5bf7807cbb17a9191d",
                        "output_index": 1,
                        "script": "493046022100fedde3515293f587c4dd9358fe7471ceef091bc0c9dcbedf1894c7caadbcf3d3022100aefa4608d4fe76270c02a8491f170fe30011e29e7235739d73c51d4c06247da00141047b1d511b8559a2003ca88715bc8331f057fa4ebf11f411142509a8ffd2f2d36d5a5e4b6019d6eb3e16878f24fd8d55676050c28b4bc5e4c44f39245beedae100",
                        "output_value": 9007500,
                        "sequence": 4294967295,
                        "addresses": [
                            "17astdTmG8zzVmry8mV8A7atAr3XefEgRX"
                        ],
                        "script_type": "pay-to-pubkey-hash"
                    }
                ],
                "outputs": [
                {
                  "value": 101491,
                  "script": "76a9148629647bd642a2372d846a7660e210c8414f047c88ac",
                  "addresses": [
                    "1DEP8i3QJCsomS4BSMY2RpU1upv62aGvhD"
                  ],
                  "script_type": "pay-to-pubkey-hash"
                },
                {
                  "value": 8896009,
                  "script": "76a9144838f65fc4e06c644423ad0430de11ca5785dcd088ac",
                  "spent_by": "4cff011ec53022f2ae47197d1a2fd4a6ac2a80139f4d0131c1fed625ed5dc869",
                  "addresses": [
                    "17astdTmG8zzVmry8mV8A7atAr3XefEgRX"
                  ],
                  "script_type": "pay-to-pubkey-hash"
                }
                ]
                },
                {
                "block_hash": "0000000000000000af64802c79f9b22e9091eb5548b4b662d5e444e61885923b",
                "block_height": 292586,
                "hash": "b4735a0690dab16b8789fceaf81c511f3be484e319f684cc214380eaa2851030",
                "addresses": [
                "18KXZzuC3xvz6upUMQpsZzXrBwNPWZjdSa",
                "1AAuRETEcHDqL4VM3R97aZHP8DSUHxpkFV",
                "1DEP8i3QJCsomS4BSMY2RpU1upv62aGvhD",
                "1VxsEDjo6ZLMT99dpcLu4RQonMDVEQQTG"
                ],
                "total": 3537488,
                "fees": 20000,
                "preference": "medium",
                "relayed_by": "",
                "confirmed": "2014-03-26T17:08:04Z",
                "received": "2014-03-26T17:08:04Z",
                "ver": 1,
                "lock_time": 0,
                "double_spend": false,
                "vin_sz": 2,
                "vout_sz": 2,
                "confirmations": 60621,
                "confidence": 1,
                "inputs": [
                {
                  "prev_hash": "729f6469b59fea5da77457f3291e2623c2516e3e8e7afc782687c6d59f4c5e41",
                  "output_index": 0,
                  "script": "483045022100d06cdad1a54081e8499a4117f9f52d7fbc83c679dda7e3c22c08e964915b7354022010a2d6af1601d28d33a456dab2bccf3fbde35b2f3a9db82f72d675c90d015571014104672a00c8ee6fa23d68094dd98188ea1491848498554a10e13194851b614168b225b28b7f5a1c6ba98b5463438ef030c48b60533031ff2de84104e549d8d06ea9",
                  "output_value": 3500000,
                  "sequence": 4294967295,
                  "addresses": [
                    "1VxsEDjo6ZLMT99dpcLu4RQonMDVEQQTG"
                  ],
                  "script_type": "pay-to-pubkey-hash"
                },
                {
                  "prev_hash": "45b74e542799343fc5ae70b715b7dd402da3a50fec766a9ebeb0879153db10ff",
                  "output_index": 1,
                  "script": "48304502203deee40f705127eb57de0bb1bb998376e11f09bbde663c614d9cf746948f9b740221008715b8df9fa6c33fad7bfa2bb72875c8e30002a61843f430b9f0af268c136e2a0141046b29997ba1e1974f88d4513257ed4021205a94cc20ef7c1c6c7b8510becb68085220b213b8864ebfb465b614a4e7719b29d81c9849aea37343962cda47945a16",
                  "output_value": 57488,
                  "sequence": 4294967295,
                  "addresses": [
                    "1AAuRETEcHDqL4VM3R97aZHP8DSUHxpkFV"
                  ],
                  "script_type": "pay-to-pubkey-hash"
                }
                ],
                "outputs": [
                {
                  "value": 3500000,
                  "script": "76a9148629647bd642a2372d846a7660e210c8414f047c88ac",
                  "addresses": [
                    "1DEP8i3QJCsomS4BSMY2RpU1upv62aGvhD"
                  ],
                  "script_type": "pay-to-pubkey-hash"
                },
                {
                  "value": 37488,
                  "script": "76a9145049e2ad94ed9c683b8f6ca67db33b979dd6d13a88ac",
                  "spent_by": "3ebe4bb294beaed58aca834af5e8148248abd9c6c6b56d9c73c2f25eb6a4838f",
                  "addresses": [
                    "18KXZzuC3xvz6upUMQpsZzXrBwNPWZjdSa"
                  ],
                  "script_type": "pay-to-pubkey-hash"
                }
                ]
                },
                {
                "block_hash": "00000000000000001528e12ffb2bdfc46f739c864952d85258485511d3d0aba3",
                "block_height": 292505,
                "hash": "0416b8db5db4fa088437008aea7889e966e326f11c52c1da95161cd2ded95185",
                "addresses": [
                "13UrVoMywxv9yaFBWvPfZ6kugWAZhLsnKo",
                "1DEP8i3QJCsomS4BSMY2RpU1upv62aGvhD",
                "1DUgQLCoJowWkcDCW13ZGSAELyr6jFG7AP",
                "1NqW3Jk1w4RisMrBs53g9bK1Rnmi2zMcfC"
                ],
                "total": 217176,
                "fees": 20000,
                "preference": "medium",
                "relayed_by": "",
                "confirmed": "2014-03-26T04:18:38Z",
                "received": "2014-03-26T04:18:38Z",
                "ver": 1,
                "lock_time": 0,
                "double_spend": false,
                "vin_sz": 2,
                "vout_sz": 2,
                "confirmations": 60702,
                "confidence": 1,
                "inputs": [
                {
                  "prev_hash": "df959bf4b6faa51aedde7de2d23309c147a1637e89afd36cb8f3f35149943a75",
                  "output_index": 0,
                  "script": "49304602210087cfe517c22a4001230cffadf62a0e59d286b76c343f7dfa69daf4be3e4f3562022100d15fe4dc85428850af24789c50c43e95e96d3ff27ee066823ba4dbffb4e8f02f014104c40f18fab1dcc621e78e65b02f20d0e7413e95b9de60bb6c9f32dc3bc0f2ddc9b67ba1cc2e2fafc0ee14cdcd55c97c31501b4c6dde91c37135c50ff7fbec9e5a",
                  "output_value": 100000,
                  "sequence": 4294967295,
                  "addresses": [
                    "1DUgQLCoJowWkcDCW13ZGSAELyr6jFG7AP"
                  ],
                  "script_type": "pay-to-pubkey-hash"
                },
                {
                  "prev_hash": "6b9f0e8f326bab57d56dc455dc10b00fbd5167a00475549759882b554d7217f7",
                  "output_index": 1,
                  "script": "473044022051a83d1b8bcec5093652e51eb2d51f87572a0181c65d12b6f374ca06769b70100220447a771160387584da21a22e8d3a51ff8e2fc03538af64b6d88d23b8ea28fa99014104ac5249d12d65eb0062a13d722420f881b06c732f1a820a9962035d9f87992114bf14208552a293c2bf669c969676dfef3f36b16fff30e3deb0fb6b432092691d",
                  "output_value": 137176,
                  "sequence": 4294967295,
                  "addresses": [
                    "13UrVoMywxv9yaFBWvPfZ6kugWAZhLsnKo"
                  ],
                  "script_type": "pay-to-pubkey-hash"
                }
                ],
                "outputs": [
                {
                  "value": 100000,
                  "script": "76a9148629647bd642a2372d846a7660e210c8414f047c88ac",
                  "addresses": [
                    "1DEP8i3QJCsomS4BSMY2RpU1upv62aGvhD"
                  ],
                  "script_type": "pay-to-pubkey-hash"
                },
                {
                  "value": 117176,
                  "script": "76a914ef86d94a858cd446ba7f0cd78d32677ffcc436a988ac",
                  "spent_by": "5c82a033cbfa9149836840036a392566a8c7b4dfcb0c2c4c0a20993f69b49340",
                  "addresses": [
                    "1NqW3Jk1w4RisMrBs53g9bK1Rnmi2zMcfC"
                  ],
                  "script_type": "pay-to-pubkey-hash"
                }
                ]
                },
                {
                "block_hash": "0000000000000000651ba18b29a1a7543d8fb9f6240d57b9e740014f51053ebc",
                "block_height": 292455,
                "hash": "995a50e05d197be88d4da74160b4bcd2c363ebb1a49f95e572667d580bc70aba",
                "addresses": [
                "1CzuqkzUg1ybSsVaR3NWrEoXLxYtXdG35V",
                "1DEP8i3QJCsomS4BSMY2RpU1upv62aGvhD"
                ],
                "total": 299990000,
                "fees": 10000,
                "preference": "medium",
                "relayed_by": "",
                "confirmed": "2014-03-25T21:32:08Z",
                "received": "2014-03-25T21:32:08Z",
                "ver": 1,
                "lock_time": 0,
                "double_spend": false,
                "vin_sz": 1,
                "vout_sz": 2,
                "confirmations": 60752,
                "confidence": 1,
                "inputs": [
                {
                  "prev_hash": "7c72a7f748ad3d407b977ba1004855ed14367e1a9c9a3fdb916a24302f075421",
                  "output_index": 0,
                  "script": "4830450221009336f886851ea3026f8d8836fc3c1a8d9d9456075ac440259410803767a4995a02202eee3c52aafa034d8058a236eabc3feaf80be5d8b3011bab192ee7856cee9d1b0121033a148923bf45432ab6cdbcb198abb8d23be28c5aa2ff3c6405837a9a9e4ef031",
                  "output_value": 300000000,
                  "sequence": 4294967295,
                  "addresses": [
                    "1CzuqkzUg1ybSsVaR3NWrEoXLxYtXdG35V"
                  ],
                  "script_type": "pay-to-pubkey-hash"
                }
                ],
                "outputs": [
                {
                  "value": 500000,
                  "script": "76a9148629647bd642a2372d846a7660e210c8414f047c88ac",
                  "addresses": [
                    "1DEP8i3QJCsomS4BSMY2RpU1upv62aGvhD"
                  ],
                  "script_type": "pay-to-pubkey-hash"
                },
                {
                  "value": 299490000,
                  "script": "76a914839d33de1bbd7807a03bcadbacd135316351330788ac",
                  "spent_by": "3743ba41fc279cda244ec1bb5a75fba1352968870b2957cd5508a7e5b64dc94f",
                  "addresses": [
                    "1CzuqkzUg1ybSsVaR3NWrEoXLxYtXdG35V"
                  ],
                  "script_type": "pay-to-pubkey-hash"
                }
                ]
                },
                {
                "block_hash": "00000000000000006caa894c02a7254475acaefd5adf50d97de97f85470620db",
                "block_height": 292325,
                "hash": "0c83c8321537a7c79dc6214788944ba6cd5ea76f0594453b6251fcf1856f2e4b",
                "addresses": [
                "1DEP8i3QJCsomS4BSMY2RpU1upv62aGvhD",
                "1HBB6wHbhHBmsNmoBzzKdq77LKQUcUhGp3"
                ],
                "total": 2990000,
                "fees": 10000,
                "preference": "medium",
                "relayed_by": "",
                "confirmed": "2014-03-25T00:07:31Z",
                "received": "2014-03-25T00:07:31Z",
                "ver": 1,
                "lock_time": 0,
                "double_spend": false,
                "vin_sz": 1,
                "vout_sz": 2,
                "confirmations": 60882,
                "confidence": 1,
                "inputs": [
                {
                  "prev_hash": "ed21bb99e2df321c3e28d9ec5e11010d86a5dcf02412e989ae9dbc0f5b4ff3ff",
                  "output_index": 0,
                  "script": "493046022100c1eec2a231f42f0034d7c8cc479e20967214a4e9fc6da0b95ccdcc9de3e8d2e8022100a0f80d26f71dd625f262d74c9adc74412273df4e34aaacf33c44550ba545641c0141040f60c5ea2ba9bf92637083449caa13be32ebdcc55e94ddb2d1923cf704019d80e56f48800b9e6cb9d10835f10dd4426aeac8f410877a3a1f8a94caad45187c0e",
                  "output_value": 3000000,
                  "sequence": 4294967295,
                  "addresses": [
                    "1HBB6wHbhHBmsNmoBzzKdq77LKQUcUhGp3"
                  ],
                  "script_type": "pay-to-pubkey-hash"
                }
                ],
                "outputs": [
                {
                  "value": 171116,
                  "script": "76a9148629647bd642a2372d846a7660e210c8414f047c88ac",
                  "addresses": [
                    "1DEP8i3QJCsomS4BSMY2RpU1upv62aGvhD"
                  ],
                  "script_type": "pay-to-pubkey-hash"
                },
                {
                  "value": 2818884,
                  "script": "76a914b16e9aec76e2dcca9a64b5615f9f334e2250c6df88ac",
                  "spent_by": "d035e58aa0a1f174ff2c2a0d8213f6e95102c3448e122ce4b48fcd72c9af4c41",
                  "addresses": [
                    "1HBB6wHbhHBmsNmoBzzKdq77LKQUcUhGp3"
                  ],
                  "script_type": "pay-to-pubkey-hash"
                }
                ]
                }
            ],
            "error": "",
            "errors": []
        }
        */

        return '{"address":"1DEP8i3QJCsomS4BSMY2RpU1upv62aGvhD","total_received":4433416,"total_sent":0,"balance":4433416,"unconfirmed_balance":0,"final_balance":0,"n_tx":7,"unconfirmed_n_tx":0,"final_n_tx":7,"txs":[' . TXTest::getJson() . '],"error":"","errors":[]}';
    }

    /**
     * @depends testSerializationDeserialization
     * @param FullAddress $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getAddress(), "1DEP8i3QJCsomS4BSMY2RpU1upv62aGvhD");
        $this->assertEquals($obj->getTotalReceived(), 4433416);
        $this->assertEquals($obj->getTotalSent(), 0);
        $this->assertEquals($obj->getBalance(), 4433416);
        $this->assertEquals($obj->getUnconfirmedBalance(), 0);
        $this->assertEquals($obj->getFinalBalance(), 0);
        $this->assertEquals($obj->getNTx(), 7);
        $this->assertEquals($obj->getUnconfirmedNTx(), 0);
        $this->assertEquals($obj->getFinalNTx(), 7);
        $this->assertEquals($obj->getTxs(), array(TXTest::getObject()));
    }

    /**
     * @dataProvider mockProvider
     * @param FullAddress $obj
     */
    public function testGet($obj, /** @noinspection PhpDocSignatureInspection */
                            $mockApiContext)
    {
        $mockBlockCypherRestCall = $this->getMockBuilder('\BlockCypher\Transport\BlockCypherRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockBlockCypherRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                FullAddressTest::getJson()
            ));

        /** @noinspection PhpParamsInspection */
        $result = $obj->get("1DEP8i3QJCsomS4BSMY2RpU1upv62aGvhD", array(), $mockApiContext, $mockBlockCypherRestCall);
        $this->assertNotNull($result);
    }

    /**
     * @dataProvider mockProvider
     * @param FullAddress $obj
     */
    public function testGetWithParams($obj, /** @noinspection PhpDocSignatureInspection */
                                      $mockApiContext)
    {
        $mockBlockCypherRestCall = $this->getMockBuilder('\BlockCypher\Transport\BlockCypherRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockBlockCypherRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                FullAddressTest::getJson()
            ));

        $params = array(
            'unspentOnly' => 'true',
            'before' => 300000,
        );

        /** @noinspection PhpParamsInspection */
        $result = $obj->get("1DEP8i3QJCsomS4BSMY2RpU1upv62aGvhD", $params, $mockApiContext, $mockBlockCypherRestCall);
        $this->assertNotNull($result);
    }

    /**
     * @dataProvider mockProviderGetParamsValidation
     * @param FullAddress $obj
     * @param $mockApiContext
     * @param $params
     * @expectedException \InvalidArgumentException
     */
    public function testGetParamsValidationForParams(
        $obj, /** @noinspection PhpDocSignatureInspection */
        $mockApiContext,
        $params
    )
    {
        $mockBlockCypherRestCall = $this->getMockBuilder('\BlockCypher\Transport\BlockCypherRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockBlockCypherRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                FullAddressTest::getJson()
            ));

        /** @noinspection PhpUndefinedVariableInspection */
        /** @noinspection PhpParamsInspection */
        $obj->get("1DEP8i3QJCsomS4BSMY2RpU1upv62aGvhD", $params, $mockApiContext, $mockBlockCypherRestCall);
    }

    /**
     * @dataProvider mockProvider
     * @param FullAddress $obj
     */
    public function testGetMultiple($obj, $mockApiContext)
    {
        $mockBlockCypherRestCall = $this->getMockBuilder('\BlockCypher\Transport\BlockCypherRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockBlockCypherRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                '[' . FullAddressTest::getJson() . ']'
            ));

        $fullAddressList = Array(FullAddressTest::getObject()->getAddress());

        $result = $obj->getMultiple($fullAddressList, array(), $mockApiContext, $mockBlockCypherRestCall);
        $this->assertNotNull($result);
        $this->assertEquals($result[0], FullAddressTest::getObject());
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return FullAddress
     */
    public static function getObject()
    {
        return new FullAddress(self::getJson());
    }

    /**
     * @dataProvider mockProvider
     * @param FullAddress $obj
     */
    public function testGetMultipleWithParams($obj, $mockApiContext)
    {
        $mockBlockCypherRestCall = $this->getMockBuilder('\BlockCypher\Transport\BlockCypherRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockBlockCypherRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                '[' . FullAddressTest::getJson() . ']'
            ));

        $fullAddressList = Array(FullAddressTest::getObject()->getAddress());
        $params = array(
            'unspentOnly' => 'true',
            'before' => 300000,
        );

        $result = $obj->getMultiple($fullAddressList, $params, $mockApiContext, $mockBlockCypherRestCall);
        $this->assertNotNull($result);
        $this->assertEquals($result[0], FullAddressTest::getObject());
    }

    /**
     * @dataProvider mockProviderGetParamsValidation
     * @param FullAddress $obj
     * @param $mockApiContext
     * @param $params
     * @expectedException \InvalidArgumentException
     */
    public function testGetMultipleParamsValidationForParams(
        $obj, /** @noinspection PhpDocSignatureInspection */
        $mockApiContext,
        $params
    )
    {
        $mockBlockCypherRestCall = $this->getMockBuilder('\BlockCypher\Transport\BlockCypherRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockBlockCypherRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                '[' . FullAddressTest::getJson() . ']'
            ));

        $fullAddressList = Array(FullAddressTest::getObject()->getAddress());

        /** @noinspection PhpUndefinedVariableInspection */
        /** @noinspection PhpParamsInspection */
        $obj->get($fullAddressList, $params, $mockApiContext, $mockBlockCypherRestCall);
    }
}