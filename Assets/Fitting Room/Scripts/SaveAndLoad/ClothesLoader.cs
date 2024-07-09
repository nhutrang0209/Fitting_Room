using System;
using UnityEngine;

namespace Fitting_Room
{
    public class ClothesLoader : MonoBehaviour
    {
        [SerializeField] private string editorPath;
        [SerializeField] private string jsonPath;

        private Player Player => Player.Instance;

        private ImportInfo _clothLoadData;

        private ClothingImportData importData;
        
        private void Start()
        {
            LoadData();
        }

        private void LoadData()
        {
            var path = jsonPath;
            
#if UNITY_EDITOR
            path = editorPath;
            importData = JsonFileHandler.ReadFromJson<ClothingImportData>(path);
            foreach (var clothInfo in importData.importInfos)
            {
                _clothLoadData = clothInfo;
                var clothObjName = clothInfo.objName;
                var clothing = FindByObjName(clothObjName);

                clothing.Category = clothInfo.category;
                
                if (clothInfo.isEnable)
                    Player.PutOn(clothing);
            }
            return;
#endif
            JsonFileHandler.ReadFromWebJson<ClothingImportData>(path, OnJsonLoaded);
            
        }
        
        private void OnJsonLoaded(ClothingImportData data)
        {
            importData = data;
            foreach (var clothInfo in importData.importInfos)
            {
                _clothLoadData = clothInfo;
                var clothObjName = clothInfo.objName;
                var clothing = FindByObjName(clothObjName);

                clothing.Category = clothInfo.category;
                
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