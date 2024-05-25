using UnityEngine;

namespace Fitting_Room
{
    public enum Category
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
        [SerializeField] private string clothName;
        [SerializeField] private Category category;
        [SerializeField] private Size clothSize;
        [SerializeField] private GameObject modelFbx;

        public GameObject ModelFbx => modelFbx;
    }
}