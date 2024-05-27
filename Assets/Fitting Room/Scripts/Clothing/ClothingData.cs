using UnityEngine;
using UnityEngine.Serialization;

namespace Fitting_Room
{
    public enum ClothCategory
    {
        Dress,
        Shirt,
        Pants
    }

    public enum Size
    {
        S, M, L
    }
    
    [CreateAssetMenu(menuName = "Fitting Room/Clothing", fileName = "Cloth")]
    public class ClothingData : ScriptableObject
    {
        [SerializeField] private int id;
        [SerializeField] private string clothName;
        [SerializeField] private ClothCategory clothCategory;
        [SerializeField] private Size clothSize;
        [SerializeField] private Sprite itemSprite;
        [SerializeField] private GameObject modelFbx;

        public int ID => id;
        public ClothCategory Category => clothCategory;
        public string ClothName => clothName;
        public Sprite ClothSprite => itemSprite;
        public GameObject ModelFbx => modelFbx;
    }
}