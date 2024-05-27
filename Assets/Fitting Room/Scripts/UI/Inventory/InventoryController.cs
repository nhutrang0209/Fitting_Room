using System;
using System.Collections.Generic;
using UnityEngine;

namespace Fitting_Room
{
    public class InventoryController : MonoBehaviour
    {
        [Header("List inventory item")]
        [SerializeField] private List<ItemInventory> itemInventories;

        [Header("List clothing Data")] 
        [SerializeField] private List<ClothingData> clothingDatas;

        private void Start()
        {
            for (int i = 0; i < itemInventories.Count; ++i)
            {
                var itemInventory = itemInventories[i];

                itemInventory.SetData(clothingDatas[i]);
                itemInventory.SetNotDressed();
            }

            foreach (var itemInventory in itemInventories)
            {
                itemInventory.Clothing.OnPutOn += () =>
                {
                    OnPutOn(itemInventory.Clothing);
                };
            }
        }

        private void OnPutOn(Clothing clothing)
        {
            foreach (var itemInventory in itemInventories)
            {
                if (clothing.Category == itemInventory.Clothing.Category
                    && clothing.ID != itemInventory.Clothing.ID)
                    itemInventory.SetNotDressed();
            }
        }
    }
}