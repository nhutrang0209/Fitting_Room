using System;
using UnityEngine;

namespace Fitting_Room
{
    public class ClothesLoader : MonoBehaviour
    {
        [SerializeField] private string jsonPath;

        private Player Player => Player.Instance;
        
        private void Start()
        {
            LoadData();
        }

        private void LoadData()
        {
            var data = JsonFileHandler.ReadFromJson<ClothingImportData>(jsonPath);

            foreach (var clothInfo in data.importInfos)
            {
                var clothObjName = clothInfo.objName;
                var clothing = FindByObjName(clothObjName);
                
                if (clothInfo.isEnable)
                    Player.PutOn(clothing);
            }
        }

        private Clothing FindByObjName(string objName)
        {
            foreach (var clothing in Player.ClothingInventory)
            {
                if (clothing.gameObject.name == objName)
                    return clothing;
            }

            return null;
        }
    }
}